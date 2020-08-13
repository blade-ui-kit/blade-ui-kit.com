<?php

namespace App\Console\Commands;

use App\Models\Icon;
use App\Models\IconSet;
use BladeUI\Icons\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class ParseIcons extends Command
{
    protected $signature = 'parse:icons';

    protected $description = 'Command description';

    protected array $sets;

    public function handle(): int
    {
        $this->sets = app(Factory::class)->all();

        DB::transaction(function () {
            Icon::query()->delete();

            IconSet::each(function (IconSet $iconSet) {
                $this->parseIcons($iconSet);
            });
        });

        return 0;
    }

    protected function parseIcons(IconSet $iconSet)
    {
        $set = $this->sets[$iconSet->name];

        foreach (File::allFiles($set['path']) as $file) {
            $path = array_filter(explode('/', Str::after($file->getPath(), $set['path'])));
            $filename = implode('.', array_filter($path + [$file->getFilenameWithoutExtension()]));

            Icon::create([
                'icon_set_id' => $iconSet->id,
                'name' => $set['prefix'].'-'.$filename,
                'outlined' => $this->isOutlined($filename, $iconSet->outline_rule),
                'keywords' => $this->keywords($filename, $iconSet->ignore_rule),
            ]);
        }
    }

    protected function keywords(string $string, ?string $rule): string
    {
        return '-'.Str::of($string)->when($rule, function (Stringable $string) use ($rule) {
            return $string->replaceMatches($rule, '');
        }).'-';
    }

    protected function isOutlined(string $string, ?string $rule): bool
    {
        if ($rule === null) {
            return false;
        }

        return Str::of($string)->match($rule)->isNotEmpty();
    }
}

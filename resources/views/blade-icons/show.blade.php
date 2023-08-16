<x-layout :title="$icon->name">
    <x-navigation/>

    <div id="icon-detail" class="mt-6 relative max-w-screen-xl px-4 mx-auto sm:px-6">
        <x-h3>
            <x-a :href="$icon->set->repository">
                {{ $icon->set->name }}
            </x-a>

            <br class="sm:hidden"> / {{ $icon->name }}
        </x-h3>

        <div class="mt-6 sm:grid sm:grid-cols-5 sm:gap-10 w-full">

            <div class="sm:col-span-3 flex items-center justify-center w-full py-12 bg-gray-100 text-gray-700 relative ">
                <div class="absolute h-14 w-14 right-0 top-0">
                    <div class="sm:col-span-3 flex items-center justify-center w-full pt-1">
                        <div>
                            <x-heroicon-s-arrow-down-tray class="-ml-1 mr-3 h-5 w-5 cursor-pointer text-scarlet-600" id="download"/>
                        </div>
                        <div>
                            <x-heroicon-s-document-duplicate class="-ml-1 mr-3 h-5 w-5 cursor-pointer text-scarlet-600" id="copy"/>
                        </div>
                    </div>
                </div>
                <div>
                    {{ svg($icon->name, 'w-64 h-64', ['id' => $icon->name]) }}
                </div>
            </div>

            <div class="mt-10 sm:mt-0 sm:col-span-2 mt-2 mr-2lg:ml-2lg:mt-0">
                <div class="w-full">
                    <x-h5>Install through composer</x-h5>
                    <x-markdown class="mt-2 font-medium prose-sm prose bg-gray-700 rounded text-gray-50 sm:text-base">```
composer require {{ $icon->set->composer }}
```</x-markdown>
                </div>

                <div class="w-full mt-6">
                    <x-h5>Use it as a component</x-h5>
                    <x-markdown class="mt-2 font-medium prose-sm prose bg-gray-700 rounded text-gray-50 sm:text-base">```
<x-{{ $icon->name }} />
```</x-markdown>
                </div>

                <div class="w-full mt-6">
                    <x-h5>Use it as a directive</x-h5>
                    <x-markdown class="mt-2 font-medium prose-sm prose bg-gray-700 rounded text-gray-50 sm:text-base">```
@@svg('<?php echo $icon->name ?>')
```</x-markdown>
                </div>

                <div class="w-full mt-6">
                    <x-h5>Use it with a helper</x-h5>
                    <x-markdown class="mt-2 font-medium prose-sm prose bg-gray-700 rounded text-gray-50 sm:text-base">```
{{ svg('<?php echo $icon->name ?>') }}
```</x-markdown>
                </div>
            </div>
        </div>

        @if (count($icons))
            <div class="mt-10">
                <x-h4>
                    Similar icons
                </x-h4>

                <div class="mt-5 grid gap-3 gap-y-3 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 text-sm">
                    @foreach ($icons as $icon)
                        <div
                            class="flex flex-col items-center"
                            wire:key="result_{{$icon->id}}"
                        >
                            <x-icon-link :icon="$icon" />
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <script>

        function getSource(){
            var svg = document.getElementById('<?php echo $icon->name ?>');
            var serializer = new XMLSerializer();
            var source = serializer.serializeToString(svg);

            if(!source.match(/^<svg[^>]+xmlns="http\:\/\/www\.w3\.org\/2000\/svg"/)){
                source = source.replace(/^<svg/, '<svg xmlns="http://www.w3.org/2000/svg"');
            }
            if(!source.match(/^<svg[^>]+"http\:\/\/www\.w3\.org\/1999\/xlink"/)){
                source = source.replace(/^<svg/, '<svg xmlns:xlink="http://www.w3.org/1999/xlink"');
            }

            return source;
        }

        function downloadSvg(){
           
            source = getSource()
            source = '<?xml version="1.0" standalone="no"?>\r\n' + source;

            var url = "data:image/svg+xml;charset=utf-8,"+encodeURIComponent(source);

            const element = document.createElement("a");
            element.download = '<?php echo $icon->name ?>' + '.svg';
            element.href = url;
            element.click();
            element.remove();

        }

        function CopySvg(){
            source = getSource();

            var tempText = document.createElement("input");
            tempText.value = source;
            tempText.hidden = true;
            document.body.appendChild(tempText);
            tempText.select();
            
            document.execCommand("copy");
            document.body.removeChild(tempText);
            navigator.clipboard.writeText(source);
        }

        document.getElementById("download").onclick = () => {
            downloadSvg()
        };

        document.getElementById("copy").onclick = () => {
            CopySvg()
        };

        
    </script>

    <x-footer/>
</x-layout>

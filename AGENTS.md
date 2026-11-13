# Agent knowledge base

## Public catalogue performance

The website disables automatic registration of every installed icon as a named Blade component.
Use `<x-icon name="heroicon-o-heart" />` or `svg('heroicon-o-heart')` in website templates instead
of `<x-heroicon-o-heart />`. Keep `blade-icons.components.default` set to `icon` so the generic
component remains available. The example snippets shown to visitors are unchanged.

Similar-icon searches cache at most 21 IDs for one hour, shared by icons with identical keywords
and the same Scout driver. Pages display at most 20 similar icons, exclude the current icon, and
load current database records in search-result order. Use a persistent `CACHE_STORE` (the example
configuration uses `file`); the `array` store does not share results across requests.
`icons:import` changes the cache generation after its database transaction succeeds, because an
import replaces icon IDs. Cache keys remain stable across imports; the generation is stored in
each cached value. Manual database edits or an independent search-index rebuild can leave related
results stale for up to one hour; clear the application cache after such changes if immediate
freshness is needed. Keep the database import and Scout reindex together in the deployment
workflow, and do not serve traffic against a partially rebuilt search index.

Deploy the icon lookup indexes with `php artisan migrate --force` and rebuild configuration and
compiled views through the normal deployment process. No rendered HTML, arbitrary user search,
Livewire response, session, CSRF token, cookie, redirect or error response is shared by this cache.
Preserve existing private response headers; this does not make HTML edge-cacheable.

Caching repeated related searches does not eliminate cold crawls or PHP bootstrap/rendering costs.
Use Meilisearch for production search: Scout's collection driver hydrates the entire catalogue
before filtering, even with a result limit. Monitor origin latency, CPU and FPM saturation after
deployment. If needed, consider a narrowly scoped edge rate limit based on measured per-client
traffic and a separate PHP pool for containment. Neither these application changes nor more PHP
workers alone guarantee availability on a CPU-saturated shared host. Infrastructure changes need
separate authorization.

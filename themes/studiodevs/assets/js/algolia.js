/* global instantsearch algoliasearch */

const search = instantsearch({
  indexName: 'stdevs_dom_games',
  searchClient: algoliasearch('SSKVXOUJQQ', '2705bca66da1011df1a616455e3791c8'),
  insights: true,
});

search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
]);

search.start();

# Wiki Media Cred: Issues
See the WikiCred project: [Turning Wikimedia into a news-site credibility tool](https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec).

A list of :arrow_right:issues encountered while adding news-media credibility statements into Wikidata.

## Domain name
Tasks:
1. Add domain name as an item's `alias`.
1. Run script to get valid URL from the domain name, e.g., status code: `200`, with correct protocol (https?) and subdomain, if any (www?.
1. Add URL of `official website` ([P856](https://www.wikidata.org/wiki/Property:P856)), with `preferred rank` ([Q71533031](https://www.wikidata.org/wiki/Q71533031)).

:arrow_right: How do we handle the same domain name for multiple entities? This often happens in mergers and publishing networks.
  inception (P571) https://www.wikidata.org/wiki/Property:P571
  start time (P580)

:arrow_right: How do we add the domain name registration date? A credibility indicator.

:arrow_right: Domain name is not a property, even though it is more specific and immutable than `official website`. While the domain name remains the same, URLs often change (e.g., http to https).

## QID matches
Queries techniques for finding QIDs for entries in external databases. (With regex searches that: remove "The ", replace "-", add city and state, add "newspaper")

:arrow_right: How do we avoid duplicates when adding new Wikidata items for entries not found.

## Press association members
Prop: `member of` ([P463](https://www.wikidata.org/wiki/Property:P463))

## Non-member vetted databases
:arrow_right: How do we indicate inclusion in an external database of vetted, legitimate news outlets (often made for research), that aren't membership lists? Examples: UNS's News Deserts and Project Oasis, 

Possible props: 
* indexed in bibliographic review ([P8875](https://www.wikidata.org/wiki/Property:P8875)) — "bibliographic review(s) and/or database(s) which index this academic journal
indexed in bibliographic database"
* `part of` ([P361](https://www.wikidata.org/wiki/Property:P361))

## Place
FIPS (55-3), GNIS.

:arrow_right: How do we indicate a newspaper's/news site's geographical coverage?

<hr>
## Notes
`news media` [(Q1193236)(https://www.wikidata.org/wiki/Q1193236)]
[news media and its subclasses](https://angryloki.github.io/wikidata-graph-builder/?item=Q1193236&property=P279&mode=reverse&sc_color=%231c5ec3c4&sc_width=5)
`` ([](https://www.wikidata.org/wiki/Property:))

https://github.com/scotch-io/All-Github-Emoji-Icons/tree/master

:arrow_right: Clark Fork Valley Press	and Mineral Independent merger, [shares domain name](https://vp-mi.com/).

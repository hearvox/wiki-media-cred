# Issues in adding news-media credibility data into Wikidata

## Place
FIPS (55-3), GNIS.

How do we indicate a newspaper's/news site's geographical coverage?

## Domain name
* Add domain name as alias.
* Run script to get confirmed URL (status code: 200) from domain name (e.g., https protocol? www subdomain?).
* Add URL of official website, with rank: preferred.

How do we handle same domain name for multiple entities?
  Often happens in mergers and publishing networks.

How we do add domain name registration date? A credibility indicator.

## QID matches
Queries techniques for finding QIDs for entries in external databases. (In searches: remove "The ", replace "-", add city and state, add "newspaper")

Avoiding duplicates when adding new Wikidata items for entries not found.

## Press association members
Prop: member of 

## Non-member vetted datatbases
How do we indicate inclusion in an external database that a vetted database of legitimate news-outlets (often for research purposes), but not a membership list. Examples: UNS's News Deserts and Project Oasis, 

Possible props: 
* indexed in bibliographic review ([P8875](https://www.wikidata.org/wiki/Property:P8875)) — "bibliographic review(s) and/or database(s) which index this academic journal
indexed in bibliographic database"
* part of ([P361](https://www.wikidata.org/wiki/Property:P361))

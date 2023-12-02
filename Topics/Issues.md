# Wiki Media Cred: Issues
See the WikiCred project: [Turning Wikimedia into a news-site credibility tool](https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec).

A list of issues ( :arrow_right: ) encountered while adding news-media credibility statements into Wikidata.



## Domain registration
The registration date of a news outlet's domain name can be a credibility indicator: most legit news sites registered their domain decades ago while most fake news sites are more recent: The average registration year for [U.S. daily newspapers](https://docs.google.com/spreadsheets/d/1WPU3ILa6YAFoKwryXQWudXv_MCzCaseBL-PrjlbfnFg/edit#gid=30371215)g) is 1998, for [fake-news sites](https://docs.google.com/spreadsheets/d/1ck1_FZC-97uDLIlvRJDTrGqBk0FuDe9yHkluROgpGS8/edit#gid=1144285784) it's 2014.

But there's no domain-name property and qualifying `official website` ([P856](https://www.wikidata.org/wiki/Property:P856)) with `start time` is imprecise: https URLs often 'started' long after domain registration.

:arrow_right: How do we add domain-registration date?

## Domain-name
The domain name of a news outlet's website is (close to) a unique identifier. Adding the domain name as an item's 'alias' is helpful. But there seems to be no property for domain name, only for URLs, which are less specific and more mutable, e.g., http to https.

:arrow_right: Is there a way, in addition to alias, to state a news site's domain name?




## QID matches
Queries techniques for finding QIDs for entries in external databases. (With regex searches that: remove "The ", replace "-", add city and state, add "newspaper")

:arrow_right: How do we avoid duplicates when adding new Wikidata items for entries not found.

## Press association members
Prop: `member of` ([P463](https://www.wikidata.org/wiki/Property:P463))

## Non-member databases
:arrow_right: * How can I indicate inclusion in a database of legitimate news sources (if ‘member of’ isn’t accurate)? 

Researchers and media orgs have compiled several sizable, vetted databases of credible news sites, among them: UNS's [News Deserts](https://www.usnewsdeserts.com/) and [Project Oasis](https://www.projectnewsoasis.com/), JournalList's [trust.txt]{https://journallist.net/), and the [Alliance for Audited Media](https://auditedmedia.com/)

Possible props: 
* indexed in bibliographic review ([P8875](https://www.wikidata.org/wiki/Property:P8875)) — "bibliographic review(s) and/or database(s) which index this academic journal
indexed in bibliographic database"
* `part of` ([P361](https://www.wikidata.org/wiki/Property:P361))

## Place
:arrow_right: * How do we add a news-outlet's geographical coverage (especially if different from ‘place of publication' and headquarters’)?


FIPS (55-3), GNIS.

:arrow_right: How do we indicate a newspaper's/news site's geographical coverage?

## Project tasks
The project will add:
1. Domain names
1. Domain registration dates
1. Confirmed, valid URL
1. Press association membership
1. Inclusion in lists of legit new sources
1. Place of publication<sup>*</sup>


<sup>*</sup> If missing.
<sup>**</sup> Maybe.

Specific tasks:
1. Making news-related classes a subclass of [(Q1193236)(https://www.wikidata.org/wiki/Q1193236)] (if not already).
1. Making outlier U.S. news outlets an 'instance of' either 'news media' or one of its subclasses.
1. Matching news-media QIDs with domain names, using external databases.
1. Adding any missing 'place of publication' to news media without one.
1. Add domain name as an item's `alias`.
1. Run script to get valid URL from the domain name, e.g., status code: `200`, with correct protocol (https?) and subdomain, if any (www?.
1. Add URL of `official website` ([P856](https://www.wikidata.org/wiki/Property:P856)), with `preferred rank` ([Q71533031](https://www.wikidata.org/wiki/Q71533031)).
1. (Maybe add 'reason for preferred rank' (P7452): 'currently valid value' (Q71536244), see `list of Wikidata reasons for preferred rank` ([Q76637123](https://www.wikidata.org/wiki/Q76637123)).



<!--
## Notes
`news media` [(Q1193236)(https://www.wikidata.org/wiki/Q1193236)]
[news media and its subclasses](https://angryloki.github.io/wikidata-graph-builder/?item=Q1193236&property=P279&mode=reverse&sc_color=%231c5ec3c4&sc_width=5)
`` ([](https://www.wikidata.org/wiki/Property:))

https://github.com/ikatyang/emoji-cheat-sheet/tree/master
https://docs.github.com/en/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax


:arrow_right: Clark Fork Valley Press	and Mineral Independent merger, [shares domain name](https://vp-mi.com/).
-->



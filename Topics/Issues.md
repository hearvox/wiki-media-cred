# Wiki Media Cred: Issues
See the WikiCred project: [Turning Wikimedia into a news-site credibility tool](https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec).

A list of issues ( :arrow_right: ) encountered while adding (U.S.) news-media credibility statements into Wikidata.

## Domain registration
:arrow_right: How do we add domain-name registration date?

The registration date of a news outlet's domain name can be a credibility indicator: most legit news sites registered their domain decades ago while most fake news sites are more recent: The average registration year for [U.S. daily newspapers](https://docs.google.com/spreadsheets/d/1WPU3ILa6YAFoKwryXQWudXv_MCzCaseBL-PrjlbfnFg/edit#gid=30371215)g) is 1998, for [fake-news sites](https://docs.google.com/spreadsheets/d/1ck1_FZC-97uDLIlvRJDTrGqBk0FuDe9yHkluROgpGS8/edit#gid=1144285784) it's 2014.

But there's no domain-name property and qualifying the `official website` ([P856](https://www.wikidata.org/wiki/Property:P856)) with `start time` is imprecise: the https in an URLs often 'started' long after domain registration.

## Domain-name
:arrow_right: How do we add domain name asa a statment (i.e., in addition to `alias`)?

There's no property for domain name, only for URLs, which are less specific and more mutable (e.g., http to https). The domain name of a news outlet's website is (close to) a unique identifier. Adding the domain name as an item's 'alias' is helpful but adding it as a statement would be better structured data.

## Press association members


## Non-member databases
:arrow_right: How can we indicate inclusion in a database of legitimate news sources (if ‘member of’ isn’t accurate)? 

This project will add statements noting membership in a state press association, another credibility indicator. But there are several, sizable, vetted databases of credible news sites, created by researchers and media orgs, which aren't member lists (e.g., UNC's [News Deserts](https://www.usnewsdeserts.com/) and [Project Oasis](https://www.projectnewsoasis.com/), JournalList's [trust.txt]{https://journallist.net/), and the [Alliance for Audited Media](https://auditedmedia.com/)). The `member of` ([P463](https://www.wikidata.org/wiki/Property:P463)) property wouldn't be accurate. The only props I could find that even come close:
* indexed in bibliographic review ([P8875](https://www.wikidata.org/wiki/Property:P8875)) — "bibliographic review(s) and/or database(s) which index this academic journal"
* `part of` ([P361](https://www.wikidata.org/wiki/Property:P361))

## Place
:arrow_right: Should we add a news-outlet's geographical coverage (especially if different from ‘place of publication' and headquarters’)?

Neither 

:arrow_right: How do we indicate a newspaper's/news site's geographical coverage?

## QID matches
:arrow_right: How do we avoid duplicates when adding new Wikidata items for entries not found?

Queries techniques for finding QIDs for entries in external databases. (With regex searches that: remove "The ", replace "-", add city and state, add "newspaper")

## Project tasks
The project is matching news outlets in Wikidata with those listed in media databases, creating new items for outlets in the external lists but not in Wikidata, and then importing the external data into Wikdata, including:
1. Domain names (as `alias`)
1. Domain registration dates
2. Consistent `description` wording (with city and state)
1. Validated URL
1. Press association membership(s)
1. Inclusion in non-member lists of legit news sources
1. Credibility ratings (Media Bias/Fack Check)
1. Place of publication<sup>*</sup>
1. Year founded<sup>*</sup> 
1. Street address<sup>**</sup>

<br><em><sup>*</sup> If missing.</em>
<br><em><sup>**</sup> Maybe.</em>


Done:
1. Making all news-related classes a subclass of `new media` ([Q1193236](https://www.wikidata.org/wiki/Q1193236)) (if not already).
1. Making outlier U.S. news outlets an 'instance of' either 'news media' or one of its subclasses.
1. Matching news-media QIDs with domain and news-outlet names in external databases.
1. Adding any missing 'place of publication' to news media without one.

Todo:
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


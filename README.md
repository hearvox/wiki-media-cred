# Wiki Media Cred
Turning Wikimedia into a news-site credibility tool.

Resources and data diary for the <a href="https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec">Wikicred/Iffy.news project</a> adding news-site credibility indicators to Wikidata/Wikipedia.

## Data ducks in row
1. Get all news outlets under one general category: `news media`
2. Get subclasses into logical categories (one or two levels down).
3. Chnage specific new-outlets improperly `labeled sublclass` to 'instance of`.
4. Names for unlabled subclasses (one or two levels down), consulting the item's Wikipedia article or `official webste`

Example: https://www.wikidata.org/wiki/Q16708966 `subclass of` `news agency`

This Month in GLAM (Q15868218) Wikimedia newsletter

`newspaper` `daily newspaper`

Soe are unsolvable: https://www.wikidata.org/wiki/Q87527714
https://www.wikidata.org/wiki/Q31075044

UNlableed and miscat ofte the same.

## Data decisions
The goal is to add data to news outlets in Wikdata (WD) which could help distinguish fact-based from fake news. That data comes from external databases. I;m using domain names to relate the data with the WD items. Tasks to do that are:
1. List news-outlet WD QIDs and labels.
1. Match news-outlet domain names with their QIDs.

### 1. News-outlets in WD
Using the Wikidata Query Service…

### 2. Domain-name matches

## Wikidata entities

### Todo
* Add MBFC ratings (credibility, factual-reporting, maybe bias) to entities (2K) with MBFC Identifier IDs.
* Create entities for USA state press association, e.g, [Colorado Press Association](https://www.wikidata.org/wiki/Q5148862) (instance of: `correspondents' association` (<a href="https://www.wikidata.org/wiki/Q22679796">Q22679796</a>).
* Relate publication to their state (and national) press association to which they belong as instance of: `member` ([P463](https://www.wikidata.org/wiki/Property:P463)).

### Done
* Relate classes describing news-outlets to [`news media`](https://www.wikidata.org/wiki/Q1193236) (as subclass: [`news program`](https://www.wikidata.org/wiki/Q1358344), [`news program`](https://www.wikidata.org/wiki/Q1358344),  [`news magazine`](https://www.wikidata.org/wiki/Q1684600)).
* Add [`place of publication`](https://www.wikidata.org/wiki/Property:P291) city to 300 news-outlets.
* Dissolved vs. discontinued. Check for references, add precision to data (day, month, or year).

### Docs
* Add updated URLs to items as values for the property: `official website` ([P856](https://www.wikidata.org/wiki/Property:P856)) property, with a [preferred rank](https://www.wikidata.org/wiki/Help:Ranking#Preferred_rank). But do not remove old URLs. Also, URLs should be unique: no other item should have the same official-website URL (property has a distinct-values constraint).
* Quick statements cannot set rank. Will try wikibase-cli.
* For different items with the same name, add statement for property: `different from` ([P1889](https://www.wikidata.org/wiki/Property:P18890)) with the qualifier: `applies to name of object` ([P8338](https://www.wikidata.org/wiki/Property:P8338)).
* Property for date estables: `inception` ([P571](https://www.wikidata.org/wiki/Property:P571)).

### Quick Statements
* Use [“Run in Background”](https://www.wikidata.org/wiki/Help:QuickStatements#Using_QuickStatements_version_2_in_batch_mode) mode (for most batches).
* Tool **cannot** add rank, try [wikibase-cli](https://github.com/maxlath/wikibase-cli) for `official website` URL.

## Wikidata:WikiProject Source Reliability
* Add Iffy Index of Unreliable Sources (JSON) to [WD:CRAP](https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability) GitHub [source-reliability](https://github.com/the-interlace/source-reliability).
* Add Pink Slime (JSON) to WD:CRAP GitHub source-reliability.
* Property proposal: https://www.wikidata.org/wiki/Wikidata:Property_proposal/assessed_source_reliability 
* Schema: https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability#Data_model

## API
* wikibase-cli: https://github.com/maxlath/wikibase-cli
* Wikidata Query Service: https://query.wikidata.org/
* Mix'n'Match (match datasets to Wikidata): https://mix-n-match.toolforge.org/#/import/

## DataViz
Using `news media` ([Q1193236](https://www.wikidata.org/wiki/Q1193236)) as seed:
* Wikidata Graph Builder: https://angryloki.github.io/wikidata-graph-builder/?item=Q1193236&property=P279&mode=reverse&sc_color=%231c5ec3c4&sc_width=5
* Wikidata generic tree: https://wikidata-todo.toolforge.org/tree.html?q=1193236&rp=279
* Reasonator ("Wikidata entries in a item-type-optimized fashion, and… related, significant data): https://reasonator.toolforge.org/?q=Q1193236
* SQID ("information about Wikidata classes and properties…  inspired by Magnus Manske's Reasonator): https://sqid.toolforge.org/#/view?id=Q1193236
* mataphacts ("demo system based on the open Wikidata knowledge graph"): https://wikidata.metaphacts.com/resource/wd:Q1193236
* WD News Media, sheet with `news media` subclass hierarchy: https://docs.google.com/spreadsheets/d/1oX4IYKHEsaCdkpv07ftcfYtKAtG6mRm5eYA5P-GIEMI/edit#gid=0)
* Template:Subclass list (with link to building query): https://m.wikidata.org/wiki/Template:Subclass_list

## Wikipedia articles
### Todo
*Coming*

### Done
*Nada*

*Wikimedia User: <a href="https://www.wikidata.org/wiki/Special:Contributions/Hearvox">Hearvox contributions</a>*

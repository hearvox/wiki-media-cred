# wiki-media-cred
Turning Wikimedia into a news-site credibility tool.

Resources and data diary for the <a href="https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec">Wikicred/Iffy.news project</a> adding news-site credibility indicators to Wikidata/Wikipedia.

## Wikidata entities

### Todo
* Add MBFC ratings (credibility, factual-reporting, maybe bias) to entities (2K) with MBFC Identifier IDs.
* Create entities for USA state press association, e.g, [Colorado Press Association](https://www.wikidata.org/wiki/Q5148862) (instance of: `correspondents' association` (<a href="https://www.wikidata.org/wiki/Q22679796">Q22679796</a>).
* Relate publication to their state (and national) press association to which they belong as instance of: `member` ([P463](https://www.wikidata.org/wiki/Property:P463)).
* Property: https://www.wikidata.org/wiki/Wikidata:Property_proposal/assessed_source_reliability
* Schema: https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability#Data_model

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
* Tool **cannot** add rank.

## Wikidata:WikiProject Source Reliability
* Add Iffy Index of Unreliable Sources (JSON) to [WD:CRAP](https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability) GitHub [source-reliability](https://github.com/the-interlace/source-reliability).
* Add Pink Slime (JSON) to WD:CRAP GitHub source-reliability.

## Wikipedia articles
### Todo
*Coming*

### Done
*Nada*

*Wikimedia User: <a href="https://www.wikidata.org/wiki/Special:Contributions/Hearvox">Hearvox contributions</a>*

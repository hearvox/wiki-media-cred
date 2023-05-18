# wiki-media-cred
Turning Wikimedia into a news-site credibility tool.

Resources and data diary for the <a href="https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec">Wikicred/Iffy.news project</a> adding news-site credibility indicators to Wikidata/Wikipedia.

## Wikidata entities

### Todo
* Add MBFC ratings (credibility, factual-reporting, maybe bias) to entities (2K) with MBFC Identifier IDs.
* Create entities for USA state press association, e.g, Colorado Press Association (instance of: correspondents' association (Q22679796)).
* Relate publication to their state (and national) press association to which they belong as instance of: member (P463).
* Property: https://www.wikidata.org/wiki/Wikidata:Property_proposal/assessed_source_reliability
* Schema: https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability#Data_model

### Done
* Relate classes describing news-outlets to news media (as subclass: news program, news program,  news magazine).
* Add place of publication city to 300 news-outlets.
* Dissolved vs. discontinued. Check for references, add precision to data (day, month, or year).

### Docs
* Add updated URLs to items as values for the property: official website (P856) property, with a preferred rank. But do not remove old URLs. Also, URLs should be unique: no other item should have the same official-website URL (property has a distinct-values constraint).
* Quick statements cannot set rank. Will try wikibase-cli.
* For different items with the same name, add statement for property: different from (P1889) with the qualifier: applies to name of object (P8338).
* Property for date estables: inception (P571).

### Quick Statements
* Use “Run in Background” mode (for most batches).
* Tool **cannot** add rank.

## Wikidata:WikiProject Source Reliability
* Add Iffy Index of Unreliable Sources (JSON) to WD:CRAP GitHub source-reliability.
* Add Pink Slime (JSON) to WD:CRAP GitHub source-reliability.

## Wikipedia articles
### Todo
*Coming*

### Done
*Nada*

*Wikimedia User: <a href="https://www.wikidata.org/wiki/Special:Contributions/Hearvox">Hearvox contributions</a>*

![Hoa](http://hoa-project.net/Media/Image/Hoa_small.png)

Hoa is a **modular**, **extensible** and **structured** set of PHP libraries.
Moreover, Hoa aims at being a bridge between industrial and research worlds.

# Grammar-based Testing using Realistic Domains in PHP

This article presentation has been presented in April 17th, 2012, at Montréal
(Quebec, Canada), for [The 8th Workshop on Advances in Model Based
Testing](https://sites.google.com/site/amost2012/) (A-MOST'12), co-located with
[The Fifth IEEE International Conference on Software Testing, Verification and
Validation](icst2012.soccerlab.polymtl.ca/Content/home/index.php) (ICST'12).

## Paper abstract

This paper presents an integration of grammar-based testing in a framework for
contract-based testing in PHP. It relies on the notion of realistic domains,
that make it possible to assign domains to data, by means of contract assertions
written inside the source code of a PHP application. Then a test generation tool
uses the contracts to generate relevant test data for unit testing. Finally a
runtime assertion checker validates the assertions inside the contracts (among
others membership of data to realistic domains) to establish the conformance
verdict. We introduce here the possibility to generate and validate complex
textual data specified by a grammar written in a dedicated grammar description
language. This approach is tool-supported and experimented on the validation of
web applications.

## Quick usage

This presentation is written in Latex. A PDF is already available in
`EDGB12.pdf`, but to compile it, all you have to do is:

    $ make
    $ make open

## Bibtex

    @inproceedings{icst/EnderlinDGB12,
      author    = {Ivan Enderlin and
                   Frédéric Dadeau and
                   Alain Giorgetti and
                   Fabrice Bouquet},
      title     = {Grammar-Based Testing Using Realistic Domains in PHP},
      booktitle = {ICST},
      year      = {2012},
      pages     = {509-518},
      ee        = {http://doi.ieeecomputersociety.org/10.1109/ICST.2012.136},
      crossref  = {icst/2012},
      bibsource = {DBLP, http://dblp.uni-trier.de}
    }

    @proceedings{icst/2012,
      editor    = {Giuliano Antoniol and
                   Antonia Bertolino and
                   Yvan Labiche},
      title     = {2012 IEEE Fifth International Conference on Software Testing,
                   Verification and Validation, Montreal, QC, Canada, April
                   17-21, 2012},
      booktitle = {ICST},
      publisher = {IEEE},
      year      = {2012},
      isbn      = {978-1-4577-1906-6},
      ee        = {http://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=6200016},
      bibsource = {DBLP, http://dblp.uni-trier.de}
    }

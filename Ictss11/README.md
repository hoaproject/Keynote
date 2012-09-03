![Hoa](http://hoa-project.net/Media/Image/Hoa_small.png)

Hoa is a **modular**, **extensible** and **structured** set of PHP libraries.
Moreover, Hoa aims at being a bridge between industrial and research worlds.

# Praspel: A Specification Language for Contract-Driven Testing in PHP

This article presentation has been presented in November 9, 2012, at Paris
(France), for [The 23rd IFIP International Conference on Testing Software and Systems](http://ictss2011.lri.fr/) (ICTSS'12).

## Paper abstrcat

We introduce in this paper a new specification language named Praspel, for PHP
Realistic Annotation and SPEcification Language. This language is based on the
Design-by-Contract paradigm. Praspel clauses annotate methods of a PHP class in
order to both specify their contracts, using pre- and postconditions, and assign
realistic domains to the method parameters. A realistic domain describes a set
of concrete, and hopefully relevant, values that can be assigned to the data of
a program (class attributes and method parameters).

Praspel is implemented into a unit test generator for PHP that offers a random
test data generator, which computes test data, coupled with a runtime assertion
checker, which decides whether a test passes or fails by checking the
satisfaction of the contracts at run-time.

## Quick usage

This presentation is written in Latex. A PDF is already available in
`EDGB11.pdf`, but to compile it, all you have to do is:

    $ make
    $ make open

## Bibtex

    @inproceedings{ictss/EnderlinDGO11,
      author    = {Ivan Enderlin and
                   Frédéric Dadeau and
                   Alain Giorgetti and
                   Abdallah Ben Othman},
      title     = {Praspel: A Specification Language for Contract-Based Testing
                   in PHP},
      booktitle = {ICTSS},
      year      = {2011},
      pages     = {64-79},
      ee        = {http://dx.doi.org/10.1007/978-3-642-24580-0_6},
      crossref  = {ictss/2011},
      bibsource = {DBLP, http://dblp.uni-trier.de}
    }

    @proceedings{ictss/2011,
      editor    = {Burkhart Wolff and
                   Fatiha Zaïdi},
      title     = {Testing Software and Systems - 23rd IFIP WG 6.1 International
                   Conference, ICTSS 2011, Paris, France, November 7-10, 2011.
                   Proceedings},
      booktitle = {ICTSS},
      publisher = {Springer},
      series    = {Lecture Notes in Computer Science},
      volume    = {7019},
      year      = {2011},
      isbn      = {978-3-642-24579-4},
      ee        = {http://dx.doi.org/10.1007/978-3-642-24580-0},
      bibsource = {DBLP, http://dblp.uni-trier.de}
    }

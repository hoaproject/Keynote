UNAME   = $(shell uname)
PDFLTX  = @$(shell which pdflatex)
BIBTX   = @$(shell which bibtex)

FILESEX = $(wildcard ./*.tex)
FILES   = $(FILESEX:./%.tex=./%)
MAIN    = EGB13

ifeq ($(UNAME), Darwin)
PDF     = @$(shell which open)
PDFARGS =
else
PDF     = @$(shell which pdfopen)
PDFARGS = --file
endif

all: tex

tex:
	$(PDFLTX) -shell-escape $(FILESEX)

bib:
	$(BIBTX) $(MAIN)

open:
	$(PDF) $(PDFARGS) $(MAIN).pdf

clean:
	@rm -f *.aux *.log *.toc $(MAIN).pdf *.bbl *.blg *.fls *.dvi *.maf *.mtc* \
           *.out *.lof *.ex *.nav *.snm *.vrb

c: clean
o: open

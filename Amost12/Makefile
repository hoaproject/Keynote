UNAME   = $(shell uname)
PDFLTX  = @$(shell which pdflatex)
BIBTX   = @$(shell which bibtex)

FILESEX = $(wildcard ./*.tex)
FILES   = $(FILESEX:./%.tex=./%)

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

open:
	$(PDF) $(PDFARGS) EDGB12.pdf

clean:
	@rm -f *.aux *.log *.toc EDGB12.pdf *.bbl *.blg *.fls *.dvi *.maf *.mtc* \
           *.out *.lof *.ex *.nav *.snm *.vrb

c: clean
o: open

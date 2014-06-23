%skip   space          \s

// DDD.
%token  klogin         "login"
%token  login          "\w{3,255}"
%token  kbirthday      "birthday"
%token  timestamp      14\d{8}
%token  kemail         "email"
%token  email          "[\w_\-]+(\.[\w_\-]+){0,3}@\w+\.(org|net|fr)"
%token  kphone         "phonenumber"
%token  phone          "\(\+\d{2,3}\)\d\.\d{2}\.\d{3}\.\d{2}"

// Strings.
%token  quote_         "        -> string
%token  string:string  [^"]+
%token  string:_quote  "        -> default

// Objects.
%token  brace_         {
%token _brace          }
// Arrays.
%token  bracket_       \[
%token _bracket        \]
// Rest.
%token  colon          :
%token  comma          ,
%token  number         \d+

value:
    list()

#list:
    ::bracket_:: person() ( ::comma:: person() )* ::_bracket::

#person:
    ::brace_::
    pair_login() ::comma::
    pair_birthday() ::comma::
    pair_email() ::comma::
    pair_phonenumber()
    ::_brace::

#pair_login:
    ::klogin:: ::colon:: string()

#pair_birthday:
    ::kbirthday:: ::colon:: <timestamp>

#pair_email:
    ::kemail:: ::colon:: <email>

#pair_phonenumber:
    ::kphone:: ::colon:: <phone>

#string:
    ::quote_:: <string> ::_quote::

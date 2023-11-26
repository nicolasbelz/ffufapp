# Penetration Testing Techniques with ffuf

## Description of the Testing Techniques Used

The penetration testing process with `ffuf` employs a structured methodology, leveraging the `FUZZ` keyword to probe different aspects of a web application. Below is an in-depth analysis of each technique used:

### Directory Fuzzing
<div class="code-snippet">
<pre><code>ffuf -w list.txt:FUZZ -u http://localhost/FUZZ</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w list.txt:FUZZ -u http://localhost/FUZZ')">Copy</button>
</div>




Tests for directory names to uncover potentially unsecured folders containing sensitive information. `FUZZ` is a placeholder within the URL path, replaced by each entry from `list.txt`.

### Page Fuzzing
ffuf -w list.txt:FUZZ -u http://localhost/FUZZ.php


Focuses on discovering accessible PHP files by iterating through potential file names with the `.php` extension.

### Directory and Page Fuzzing with Extensions

ffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php
ffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php -v


Includes file extensions in fuzzing and provides verbose output with `-e` and `-v` flags for detailed analysis.

### Recursive Fuzzing
fuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 2
ffuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 3 -e .php


Delves into directories found during initial fuzzing, with `-recursion-depth` controlling the levels of depth.

### Parameter Fuzzing for GET and POST Requests

GET Parameter fuzzing:

ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ
ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ -mc 200


POST Parameter fuzzing:
ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php -X POST -d 'key=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded'


Examines the application's processing of query strings in GET requests and data payloads in POST requests. `-mc` flag is used to filter responses by status codes.

### Value Fuzzing

Correct ID listing:
ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded' -mc 200


Complete listing:
ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded'


Tests for valid identifiers or keys to reveal correct data handling and the application's response to valid versus invalid data.

Each method is crafted to test for different vulnerabilities, with the placement of `FUZZ` designed to mimic attacker actions and ensure comprehensive coverage of common attack vectors.

This README provides a clear guide to using ffuf for penetration testing, including detailed code snippets for each type of fuzzing technique

<script>
function copyToClipboard(text) {
  var dummy = document.createElement("textarea");
  // to avoid breaking orgain page when copying more words
  // cant copy when adding below this code
  // dummy.style.display = 'none'
  document.body.appendChild(dummy);
  // Be careful if you use `line1\nline2`, as using `\n` in a string will be counted as two characters!
  dummy.value = text;
  dummy.select();
  document.execCommand("copy");
  document.body.removeChild(dummy);
}
</script>

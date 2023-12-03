# Penetration Testing Techniques with ffuf lab
1. [Introduction](#introduction)
2. [Requirements](#requirements)
   - [Update your machine](#update-your-machine)
   - [Install docker](#install-docker)
   - [Install docker-compose](#install-docker-compose)
3. [Installation](#installation)
   - [Clone git repository](#clone-git-repository)
   - [Start lab environment](#start-lab-environment)
4. [Usage](#usage)
   - [Directory Fuzzing](#directory-fuzzing)
   - [Page Fuzzing](#page_fuzzing)
   - [Directory and Page Fuzzing with Extensions](#directory-and-page-fuzzing-with-extensions)
   - [Recursive Fuzzing](#recursive-fuzzing)
   - [Parameter Fuzzing for GET and POST Requests](#parameter-fuzzing-for-get-and-post-requests)
     * [GET Parameter fuzzing](#get-parameter-fuzzing)
     * [POST Parameter fuzzing](#get-parameter-fuzzing)
   - [Value Fuzzing](#value-fuzzing)
   - [Cookie Fuzzing](#cookie-fuzzing)
   - [Token FUzzing](#token-fuzzing)
5. [License](#license)

## Introduction
Content for the introduction section.

---

## Requirements
Instructions on how to use the application.

### Update your machine
Update your linux machine with this command:
<div class="code-snippet">
<pre><code>sudo apt update</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo apt update')"></button>
</div>

If needed upgrade your linux machine with this command:
<div class="code-snippet">
<pre><code>sudo apt upgrade</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo apt upgrade')"></button>
</div>

### Install docker
Install docker with this command
<div class="code-snippet">
<pre><code>sudo apt install -y docker.io</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo apt install -y docker.io')"></button>
</div>

You can skip this step if you have the requirement already instaled.
Check the docker version with this command:
<div class="code-snippet">
<pre><code>docker-compose --version</code></pre>
<button class="copy-button" onclick="copyToClipboard('docker-compose --version')"></button>
</div>

### Install docker-compose
Install docker-compose on your machine with this command:
<div class="code-snippet">
<pre><code>sudo wget "https://github.com/docker/compose/releases/download/v2.23.1/docker-compose-$(uname -s)-$(uname -m)" -O /usr/local/bin/docker-compose</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo wget "https://github.com/docker/compose/releases/download/v2.23.1/docker-compose-$(uname -s)-$(uname -m)" -O /usr/local/bin/docker-compose')"></button>
</div>

Test docker installation by running this command:
<div class="code-snippet">
<pre><code>docker run hello-world</code></pre>
<button class="copy-button" onclick="copyToClipboard('docker run hello-world')"></button>
</div>

You can skip this step if you have the requirement already instaled.
Check the docker version with this command:
<div class="code-snippet">
<pre><code>docker-compose --version</code></pre>
<button class="copy-button" onclick="copyToClipboard('docker-compose --version')"></button>
</div>

Change access permissions to executable with this command:
<div class="code-snippet">
<pre><code>sudo chmod +x /usr/local/bin/docker-compose</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo chmod +x /usr/local/bin/docker-compose')"></button>
</div>

---

## Installation
Steps for installing and running the web application.

### Clone git repository
Clone the project from the github repository to your direcotry on your linux machine using this command:
<div class="code-snippet">
<pre><code>sudo git clone https://github.com/nicolasbelz/webapp.git</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo git clone https://github.com/nicolasbelz/webapp.git')"></button>
</div>

### Start lab environment
Open the terminal in the cloned project directory and start the web application using this command:
<div class="code-snippet">
<pre><code>sudo docker-compose up -d</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo docker-compose up -d')"></button>
</div>

Access the web application on your browser via 'localhost':
<div class="code-snippet">
<pre><code>http://localhost</code></pre>
<button class="copy-button" onclick="copyToClipboard('http://localhost')"></button>
</div>

If the web application is not accessible check if docker is enabled by running this command:
<div class="code-snippet">
<pre><code>sudo systemctl status docker</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo systemctl status docker')"></button>
</div>

Restart docker if needed by running this command:
<div class="code-snippet">
<pre><code>sudo systemctl restart docker</code></pre>
<button class="copy-button" onclick="copyToClipboard('sudo systemctl restart docker')"></button>
</div>

---

## Usage
Guidelines and description of the testing techniques used in this project.

The penetration testing process with `ffuf` employs a structured methodology, leveraging the `FUZZ` keyword to probe different aspects of a web application. Below is an in-depth analysis of each technique used:

---

### Directory Fuzzing
This technique tests for directory names, seeking to uncover unsecured folders that could contain sensitive information. FUZZ acts as a placeholder for directory names within the URL path, and each entry from list.txt replaces FUZZ to test different directory combinations.

Correct payload:
<div class="code-snippet">
<pre><code>ffuf -w list.txt:FUZZ -u http://localhost/FUZZ</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w list.txt:FUZZ -u http://localhost/FUZZ')"></button>
</div>

Focuses on discovering accessible PHP files by iterating through potential file names with the `.php` extension.

 
---

### Page Fuzzing
Page fuzzing focuses on discovering accessible PHP files. The .php extension is fixed, and FUZZ iterates through potential file names. This could expose scripts that are unprotected or provide more information on the server's structure.

Correct payload:
<div class="code-snippet">
<pre><code>ffuf -w list.txt:FUZZ -u http://localhost/FUZZ.php</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w list.txt:FUZZ -u http://localhost/FUZZ.php')"></button>
</div>



Focuses on discovering accessible PHP files by iterating through potential file names with the `.php` extension.


---

### Directory and Page Fuzzing with Extensions
Here, the -e flag extends the fuzzing to include file extensions, effectively searching for files of a particular type. The -v flag provides verbose output, offering full URLs and redirection paths, which aids in detailed analysis of the application's response.

Correct payload:
<div class="code-snippet">
<pre><code>fffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php</code></pre>
<button class="copy-button" onclick="copyToClipboard('fffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php')"></button>
</div>
Correct payload with verbose output:
<div class="code-snippet">
<pre><code>fffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php -v</code></pre>
<button class="copy-button" onclick="copyToClipboard('fffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php -v')"></button>
</div>

<!-- ffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php
ffuf -w list.txt:FUZZ -u http://localhost/FUZZ -e .php -v -->


Includes file extensions in fuzzing and provides verbose output with `-e` and `-v` flags for detailed analysis.

---

### Recursive Fuzzing
Recursive fuzzing delves into directories found during the initial fuzzing. The -recursion-depth flag determines how many levels deep ffuf will go. This is crucial for uncovering nested directories that could lead to deeper vulnerabilities.

Correct payload with depth level 2:
<div class="code-snippet">
<pre><code>fuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 2</code></pre>
<button class="copy-button" onclick="copyToClipboard('fuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 2')"></button>
</div>

Correct payload with depth level 3 and other options:
<div class="code-snippet">
<pre><code>fuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 3 -e .php</code></pre>
<button class="copy-button" onclick="copyToClipboard('fuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 3 -e .php')"></button>
</div>
<!-- fuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 2
ffuf -w list.txt:FUZZ -u http://localhost/FUZZ -recursion -recursion-depth 3 -e .php -->


Delves into directories found during initial fuzzing, with `-recursion-depth` controlling the levels of depth.

---

### Parameter Fuzzing for GET and POST Requests
Parameter fuzzing examines how the application processes query strings in GET requests and data payloads in POST requests. By altering the key parameter, we can identify how the application responds to various inputs. The -mc flag filters out all responses except those with specific status codes, such as 200, indicating a successful hit.


#### GET Parameter fuzzing
Correct payload:
<div class="code-snippet">
<pre><code>fffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ')"></button>
</div>

Correct payload listing only response codes 200:
<div class="code-snippet">
<pre><code>fffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ -mc 200</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ -mc 200')"></button>
</div>
<!-- ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ
ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php?key=FUZZ -mc 200 -->


#### POST Parameter fuzzing
Correct payload:
<div class="code-snippet">
<pre><code>ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php -X POST -d 'key=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded'</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php -X POST -d 'key=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded')"></button>
</div>
<!-- ffuf -w parameters.txt:FUZZ -u http://localhost/admin/index.php -X POST -d 'key=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded' -->

Examines the application's processing of query strings in GET requests and data payloads in POST requests. `-mc` flag is used to filter responses by status codes.

---

### Value Fuzzing
Value fuzzing tests for valid identifiers or keys. It can reveal the correct handling of expected data and expose how the application responds to valid versus invalid data. The -mc 200 flag is used to filter responses and list only the correct IDs or keys that return a successful HTTP status.

Correct payload to list the specific ID:
<div class="code-snippet">
<pre><code>ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded' -mc 200</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded' -mc 200')"></button>
</div>
<!-- ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded' -mc 200 -->


To list all IDs:
<div class="code-snippet">
<pre><code>ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded'</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded')"></button>
</div>
<!-- ffuf -w ids.txt:FUZZ -u http://localhost/admin/flagvalue.php -X POST -d 'id=FUZZ' -H 'Content-Type: application/x-www-form-urlencoded' -->


Tests for valid identifiers or keys to reveal correct data handling and the application's response to valid versus invalid data.


### Cookie Fuzzing
Cookie Injection Vulnerability Testing explores an application's response to manipulated cookie values. This method uncovers how the application behaves when presented with both legitimate and illegitimate cookie data. Using FFUF, we systematically can test various cookie values, focusing on the access_token cookie to access a restricted page in our case study thr user_session.php

Correct payload:
<div class="code-snippet">
<pre><code>ffuf -w cookie_values.txt -u http://localhost/user_session.php -H "Cookie: access_token=FUZZ" -v</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w cookie_values.txt -u http://localhost/user_session.php -H "Cookie: access_token=FUZZ" -v')"></button>
</div>


Check the response header with this curl command:
<div class="code-snippet">
<pre><code>curl -b "access_token=XJ92n%23k%403ZQ%218hT6v" http://localhost/user_session.php -v</code></pre>
<button class="copy-button" onclick="copyToClipboard('curl -b "access_token=XJ92n%23k%403ZQ%218hT6v" http://localhost/user_session.php -v')"></button>
</div>

### Token Fuzzing
Tests the security of custom HTTP header-based authentication mechanisms. By manipulating the header values using the option -H "X-Custom-Auth: FUZZ" we can inject different values from the wordlist into the X-Custom-Auth header. The FUZZ keyword is a placeholder that ffuf replaces with each line from tokens.txt., it assesses the application's response to both legitimate and illegitimate authentication attempts. Utilizing ffuf with the -H flag, various potential authentication tokens are tested. This methodology is effective in pinpointing weaknesses in the implementation of header-based authentication in web applications.

Correct payload:
<div class="code-snippet">
<pre><code>ffuf -w tokens.txt -u http://localhost/header_auth.php -H "X-Custom-Auth: FUZZ"</code></pre>
<button class="copy-button" onclick="copyToClipboard('ffuf -w tokens.txt -u http://localhost/header_auth.php -H "X-Custom-Auth: FUZZ"')"></button>
</div>


Each method is crafted to test for different vulnerabilities, with the placement of `FUZZ` designed to mimic attacker actions and ensure comprehensive coverage of common attack vectors.


This README provides a clear guide to using ffuf for penetration testing, including detailed code snippets for each type of fuzzing technique

---

## License
License information for the project.
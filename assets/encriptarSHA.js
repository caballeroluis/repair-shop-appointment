function calcHashes()
{
  calcHash("sha1-short", "SHA-1");
  calcHash("sha1-long", "SHA-1");
  calcHash("sha224-short", "SHA-224");
  calcHash("sha224-long", "SHA-224");
  calcHash("sha256-short", "SHA-256");
  calcHash("sha256-long", "SHA-256");
  calcHash("sha384-short", "SHA-384");
  calcHash("sha384-long", "SHA-384");
  calcHash("sha512-long", "SHA-512");
  calcHash("sha512-short", "SHA-512");
  calcHMAC('hmac-sha1-short', "ASCII", "ASCII", "SHA-1");
  calcHMAC('hmac-sha1-med', "ASCII", "HEX", "SHA-1");
  calcHMAC('hmac-sha1-large', "HEX", "HEX", "SHA-1");
  calcHMAC('hmac-sha224-short', "ASCII", "ASCII", "SHA-224");
  calcHMAC('hmac-sha224-med', "ASCII", "HEX", "SHA-224");
  calcHMAC('hmac-sha224-large', "HEX", "HEX", "SHA-224");
  calcHMAC('hmac-sha256-short', "ASCII", "ASCII", "SHA-256");
  calcHMAC('hmac-sha256-med', "ASCII", "HEX", "SHA-256");
  calcHMAC('hmac-sha256-large', "HEX", "HEX", "SHA-256");
  calcHMAC('hmac-sha384-short', "ASCII", "ASCII", "SHA-384");
  calcHMAC('hmac-sha384-med', "ASCII", "HEX", "SHA-384");
  calcHMAC('hmac-sha384-large', "HEX", "HEX", "SHA-384");
  calcHMAC('hmac-sha512-short', "ASCII", "ASCII", "SHA-512");
  calcHMAC('hmac-sha512-med', "ASCII", "HEX", "SHA-512");
  calcHMAC('hmac-sha512-large', "HEX", "HEX", "SHA-512");
}

function calcHash(fieldGroupName, variant)
{
  var tmp = document.getElementById(fieldGroupName + "-ascii-comp");

  var shaObj = new jsSHA(document.getElementById(fieldGroupName + "-ascii-input").value, "ASCII");

  document.getElementById(fieldGroupName + "-ascii-result").value = shaObj.getHash(variant, "HEX");
  if (document.getElementById(fieldGroupName + "-ascii-result").value == document.getElementById(fieldGroupName + "-correct").value)
  {
    tmp.className = "correct";
    tmp.innerHTML = "Match!";
  } else {
    tmp.className = "incorrect";
    tmp.innerHTML = "Mismatch!";
  }

  tmp = document.getElementById(fieldGroupName + "-hex-comp");

  shaObj = new jsSHA(document.getElementById(fieldGroupName + "-hex-input").value, "HEX");

  document.getElementById(fieldGroupName + "-hex-result").value = shaObj.getHash(variant, "HEX");
  if (document.getElementById(fieldGroupName + "-hex-result").value == document.getElementById(fieldGroupName + "-correct").value)
  {
    tmp.className = "correct";
    tmp.innerHTML = "Match!";
  } else {
    tmp.className = "incorrect";
    tmp.innerHTML = "Mismatch!";
  }
}

function calcHMAC(fieldGroupName, textFormat, keyFormat, variant)
{
  var tmp = document.getElementById(fieldGroupName + "-comp");

  var shaObj = new jsSHA(document.getElementById(fieldGroupName + "-text").value, textFormat);

  document.getElementById(fieldGroupName + "-result").value = shaObj.getHMAC(document.getElementById(fieldGroupName + "-key").value, keyFormat, variant, "HEX");
  if (document.getElementById(fieldGroupName + "-result").value == document.getElementById(fieldGroupName + "-correct").value)
  {
    tmp.className = "correct";
    tmp.innerHTML = "Match!";
  } else {
    tmp.className = "incorrect";
    tmp.innerHTML = "Mismatch!";
  }
}
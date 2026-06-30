<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>FW-API API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:9006";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.11.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.11.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-orders">
                                <a href="#endpoints-POSTapi-v1-orders">POST api/v1/orders</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 30, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:9006</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-v1-orders">POST api/v1/orders</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:9006/api/v1/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id\": \"bngzmiyvdljnikhw\",
    \"created_at\": \"2026-06-30T13:42:36\",
    \"phone_number\": \"aykcmyuwpwlvqwrs\",
    \"country_iso_code\": \"DO\",
    \"email\": \"bauch.marcelo@example.com\",
    \"name\": \"architecto\",
    \"zip\": \"ngzmiyvdljnikhwa\",
    \"currency_code\": \"NOK\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:9006/api/v1/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "bngzmiyvdljnikhw",
    "created_at": "2026-06-30T13:42:36",
    "phone_number": "aykcmyuwpwlvqwrs",
    "country_iso_code": "DO",
    "email": "bauch.marcelo@example.com",
    "name": "architecto",
    "zip": "ngzmiyvdljnikhwa",
    "currency_code": "NOK"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-orders">
</span>
<span id="execution-results-POSTapi-v1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-orders" data-method="POST"
      data-path="api/v1/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-orders"
                    onclick="tryItOut('POSTapi-v1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-orders"
                    onclick="cancelTryOut('POSTapi-v1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-v1-orders"
               value="bngzmiyvdljnikhw"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>bngzmiyvdljnikhw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>created_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="created_at"                data-endpoint="POSTapi-v1-orders"
               value="2026-06-30T13:42:36"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-06-30T13:42:36</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-v1-orders"
               value="aykcmyuwpwlvqwrs"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>aykcmyuwpwlvqwrs</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country_iso_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country_iso_code"                data-endpoint="POSTapi-v1-orders"
               value="DO"
               data-component="body">
    <br>
<p>Example: <code>DO</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>AD</code></li> <li><code>AE</code></li> <li><code>AF</code></li> <li><code>AG</code></li> <li><code>AI</code></li> <li><code>AL</code></li> <li><code>AM</code></li> <li><code>AO</code></li> <li><code>AQ</code></li> <li><code>AR</code></li> <li><code>AS</code></li> <li><code>AT</code></li> <li><code>AU</code></li> <li><code>AW</code></li> <li><code>AX</code></li> <li><code>AZ</code></li> <li><code>BA</code></li> <li><code>BB</code></li> <li><code>BD</code></li> <li><code>BE</code></li> <li><code>BF</code></li> <li><code>BG</code></li> <li><code>BH</code></li> <li><code>BI</code></li> <li><code>BJ</code></li> <li><code>BL</code></li> <li><code>BM</code></li> <li><code>BN</code></li> <li><code>BO</code></li> <li><code>BQ</code></li> <li><code>BR</code></li> <li><code>BS</code></li> <li><code>BT</code></li> <li><code>BV</code></li> <li><code>BW</code></li> <li><code>BY</code></li> <li><code>BZ</code></li> <li><code>CA</code></li> <li><code>CC</code></li> <li><code>CD</code></li> <li><code>CF</code></li> <li><code>CG</code></li> <li><code>CH</code></li> <li><code>CI</code></li> <li><code>CK</code></li> <li><code>CL</code></li> <li><code>CM</code></li> <li><code>CN</code></li> <li><code>CO</code></li> <li><code>CR</code></li> <li><code>CU</code></li> <li><code>CV</code></li> <li><code>CW</code></li> <li><code>CX</code></li> <li><code>CY</code></li> <li><code>CZ</code></li> <li><code>DE</code></li> <li><code>DJ</code></li> <li><code>DK</code></li> <li><code>DM</code></li> <li><code>DO</code></li> <li><code>DZ</code></li> <li><code>EC</code></li> <li><code>EE</code></li> <li><code>EG</code></li> <li><code>EH</code></li> <li><code>ER</code></li> <li><code>ES</code></li> <li><code>ET</code></li> <li><code>FI</code></li> <li><code>FJ</code></li> <li><code>FK</code></li> <li><code>FM</code></li> <li><code>FO</code></li> <li><code>FR</code></li> <li><code>GA</code></li> <li><code>GB</code></li> <li><code>GD</code></li> <li><code>GE</code></li> <li><code>GF</code></li> <li><code>GG</code></li> <li><code>GH</code></li> <li><code>GI</code></li> <li><code>GL</code></li> <li><code>GM</code></li> <li><code>GN</code></li> <li><code>GP</code></li> <li><code>GQ</code></li> <li><code>GR</code></li> <li><code>GS</code></li> <li><code>GT</code></li> <li><code>GU</code></li> <li><code>GW</code></li> <li><code>GY</code></li> <li><code>HK</code></li> <li><code>HM</code></li> <li><code>HN</code></li> <li><code>HR</code></li> <li><code>HT</code></li> <li><code>HU</code></li> <li><code>ID</code></li> <li><code>IE</code></li> <li><code>IL</code></li> <li><code>IM</code></li> <li><code>IN</code></li> <li><code>IO</code></li> <li><code>IQ</code></li> <li><code>IR</code></li> <li><code>IS</code></li> <li><code>IT</code></li> <li><code>JE</code></li> <li><code>JM</code></li> <li><code>JO</code></li> <li><code>JP</code></li> <li><code>KE</code></li> <li><code>KG</code></li> <li><code>KH</code></li> <li><code>KI</code></li> <li><code>KM</code></li> <li><code>KN</code></li> <li><code>KP</code></li> <li><code>KR</code></li> <li><code>KW</code></li> <li><code>KY</code></li> <li><code>KZ</code></li> <li><code>LA</code></li> <li><code>LB</code></li> <li><code>LC</code></li> <li><code>LI</code></li> <li><code>LK</code></li> <li><code>LR</code></li> <li><code>LS</code></li> <li><code>LT</code></li> <li><code>LU</code></li> <li><code>LV</code></li> <li><code>LY</code></li> <li><code>MA</code></li> <li><code>MC</code></li> <li><code>MD</code></li> <li><code>ME</code></li> <li><code>MF</code></li> <li><code>MG</code></li> <li><code>MH</code></li> <li><code>MK</code></li> <li><code>ML</code></li> <li><code>MM</code></li> <li><code>MN</code></li> <li><code>MO</code></li> <li><code>MP</code></li> <li><code>MQ</code></li> <li><code>MR</code></li> <li><code>MS</code></li> <li><code>MT</code></li> <li><code>MU</code></li> <li><code>MV</code></li> <li><code>MW</code></li> <li><code>MX</code></li> <li><code>MY</code></li> <li><code>MZ</code></li> <li><code>NA</code></li> <li><code>NC</code></li> <li><code>NE</code></li> <li><code>NF</code></li> <li><code>NG</code></li> <li><code>NI</code></li> <li><code>NL</code></li> <li><code>NO</code></li> <li><code>NP</code></li> <li><code>NR</code></li> <li><code>NU</code></li> <li><code>NZ</code></li> <li><code>OM</code></li> <li><code>PA</code></li> <li><code>PE</code></li> <li><code>PF</code></li> <li><code>PG</code></li> <li><code>PH</code></li> <li><code>PK</code></li> <li><code>PL</code></li> <li><code>PM</code></li> <li><code>PN</code></li> <li><code>PR</code></li> <li><code>PS</code></li> <li><code>PT</code></li> <li><code>PW</code></li> <li><code>PY</code></li> <li><code>QA</code></li> <li><code>RE</code></li> <li><code>RO</code></li> <li><code>RS</code></li> <li><code>RU</code></li> <li><code>RW</code></li> <li><code>SA</code></li> <li><code>SB</code></li> <li><code>SC</code></li> <li><code>SD</code></li> <li><code>SE</code></li> <li><code>SG</code></li> <li><code>SH</code></li> <li><code>SI</code></li> <li><code>SJ</code></li> <li><code>SK</code></li> <li><code>SL</code></li> <li><code>SM</code></li> <li><code>SN</code></li> <li><code>SO</code></li> <li><code>SR</code></li> <li><code>SS</code></li> <li><code>ST</code></li> <li><code>SV</code></li> <li><code>SX</code></li> <li><code>SY</code></li> <li><code>SZ</code></li> <li><code>TC</code></li> <li><code>TD</code></li> <li><code>TF</code></li> <li><code>TG</code></li> <li><code>TH</code></li> <li><code>TJ</code></li> <li><code>TK</code></li> <li><code>TL</code></li> <li><code>TM</code></li> <li><code>TN</code></li> <li><code>TO</code></li> <li><code>TR</code></li> <li><code>TT</code></li> <li><code>TV</code></li> <li><code>TW</code></li> <li><code>TZ</code></li> <li><code>UA</code></li> <li><code>UG</code></li> <li><code>UM</code></li> <li><code>US</code></li> <li><code>UY</code></li> <li><code>UZ</code></li> <li><code>VA</code></li> <li><code>VC</code></li> <li><code>VE</code></li> <li><code>VG</code></li> <li><code>VI</code></li> <li><code>VN</code></li> <li><code>VU</code></li> <li><code>WF</code></li> <li><code>WS</code></li> <li><code>YE</code></li> <li><code>YT</code></li> <li><code>ZA</code></li> <li><code>ZM</code></li> <li><code>ZW</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-orders"
               value="bauch.marcelo@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>bauch.marcelo@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-orders"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>zip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="zip"                data-endpoint="POSTapi-v1-orders"
               value="ngzmiyvdljnikhwa"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>ngzmiyvdljnikhwa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>currency_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="currency_code"                data-endpoint="POSTapi-v1-orders"
               value="NOK"
               data-component="body">
    <br>
<p>Example: <code>NOK</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>ADP</code></li> <li><code>AED</code></li> <li><code>AFA</code></li> <li><code>AFN</code></li> <li><code>ALK</code></li> <li><code>ALL</code></li> <li><code>AMD</code></li> <li><code>ANG</code></li> <li><code>AOA</code></li> <li><code>AOK</code></li> <li><code>AON</code></li> <li><code>AOR</code></li> <li><code>ARA</code></li> <li><code>ARL</code></li> <li><code>ARM</code></li> <li><code>ARP</code></li> <li><code>ARS</code></li> <li><code>ATS</code></li> <li><code>AUD</code></li> <li><code>AWG</code></li> <li><code>AZM</code></li> <li><code>AZN</code></li> <li><code>BAD</code></li> <li><code>BAM</code></li> <li><code>BAN</code></li> <li><code>BBD</code></li> <li><code>BDT</code></li> <li><code>BEC</code></li> <li><code>BEF</code></li> <li><code>BEL</code></li> <li><code>BGL</code></li> <li><code>BGM</code></li> <li><code>BGN</code></li> <li><code>BGO</code></li> <li><code>BHD</code></li> <li><code>BIF</code></li> <li><code>BMD</code></li> <li><code>BND</code></li> <li><code>BOB</code></li> <li><code>BOL</code></li> <li><code>BOP</code></li> <li><code>BOV</code></li> <li><code>BRB</code></li> <li><code>BRC</code></li> <li><code>BRE</code></li> <li><code>BRL</code></li> <li><code>BRN</code></li> <li><code>BRR</code></li> <li><code>BRZ</code></li> <li><code>BSD</code></li> <li><code>BTN</code></li> <li><code>BUK</code></li> <li><code>BWP</code></li> <li><code>BYB</code></li> <li><code>BYN</code></li> <li><code>BYR</code></li> <li><code>BZD</code></li> <li><code>CAD</code></li> <li><code>CDF</code></li> <li><code>CHE</code></li> <li><code>CHF</code></li> <li><code>CHW</code></li> <li><code>CLE</code></li> <li><code>CLF</code></li> <li><code>CLP</code></li> <li><code>CNH</code></li> <li><code>CNX</code></li> <li><code>CNY</code></li> <li><code>COP</code></li> <li><code>COU</code></li> <li><code>CRC</code></li> <li><code>CSD</code></li> <li><code>CSK</code></li> <li><code>CUC</code></li> <li><code>CUP</code></li> <li><code>CVE</code></li> <li><code>CYP</code></li> <li><code>CZK</code></li> <li><code>DDM</code></li> <li><code>DEM</code></li> <li><code>DJF</code></li> <li><code>DKK</code></li> <li><code>DOP</code></li> <li><code>DZD</code></li> <li><code>ECS</code></li> <li><code>ECV</code></li> <li><code>EEK</code></li> <li><code>EGP</code></li> <li><code>ERN</code></li> <li><code>ESA</code></li> <li><code>ESB</code></li> <li><code>ESP</code></li> <li><code>ETB</code></li> <li><code>EUR</code></li> <li><code>FIM</code></li> <li><code>FJD</code></li> <li><code>FKP</code></li> <li><code>FRF</code></li> <li><code>GBP</code></li> <li><code>GEK</code></li> <li><code>GEL</code></li> <li><code>GHC</code></li> <li><code>GHS</code></li> <li><code>GIP</code></li> <li><code>GMD</code></li> <li><code>GNF</code></li> <li><code>GNS</code></li> <li><code>GQE</code></li> <li><code>GRD</code></li> <li><code>GTQ</code></li> <li><code>GWE</code></li> <li><code>GWP</code></li> <li><code>GYD</code></li> <li><code>HKD</code></li> <li><code>HNL</code></li> <li><code>HRD</code></li> <li><code>HRK</code></li> <li><code>HTG</code></li> <li><code>HUF</code></li> <li><code>IDR</code></li> <li><code>IEP</code></li> <li><code>ILP</code></li> <li><code>ILR</code></li> <li><code>ILS</code></li> <li><code>INR</code></li> <li><code>IQD</code></li> <li><code>IRR</code></li> <li><code>ISJ</code></li> <li><code>ISK</code></li> <li><code>ITL</code></li> <li><code>JMD</code></li> <li><code>JOD</code></li> <li><code>JPY</code></li> <li><code>KES</code></li> <li><code>KGS</code></li> <li><code>KHR</code></li> <li><code>KMF</code></li> <li><code>KPW</code></li> <li><code>KRH</code></li> <li><code>KRO</code></li> <li><code>KRW</code></li> <li><code>KWD</code></li> <li><code>KYD</code></li> <li><code>KZT</code></li> <li><code>LAK</code></li> <li><code>LBP</code></li> <li><code>LKR</code></li> <li><code>LRD</code></li> <li><code>LSL</code></li> <li><code>LTL</code></li> <li><code>LTT</code></li> <li><code>LUC</code></li> <li><code>LUF</code></li> <li><code>LUL</code></li> <li><code>LVL</code></li> <li><code>LVR</code></li> <li><code>LYD</code></li> <li><code>MAD</code></li> <li><code>MAF</code></li> <li><code>MCF</code></li> <li><code>MDC</code></li> <li><code>MDL</code></li> <li><code>MGA</code></li> <li><code>MGF</code></li> <li><code>MKD</code></li> <li><code>MKN</code></li> <li><code>MLF</code></li> <li><code>MMK</code></li> <li><code>MNT</code></li> <li><code>MOP</code></li> <li><code>MRO</code></li> <li><code>MRU</code></li> <li><code>MTL</code></li> <li><code>MTP</code></li> <li><code>MUR</code></li> <li><code>MVP</code></li> <li><code>MVR</code></li> <li><code>MWK</code></li> <li><code>MXN</code></li> <li><code>MXP</code></li> <li><code>MXV</code></li> <li><code>MYR</code></li> <li><code>MZE</code></li> <li><code>MZM</code></li> <li><code>MZN</code></li> <li><code>NAD</code></li> <li><code>NGN</code></li> <li><code>NIC</code></li> <li><code>NIO</code></li> <li><code>NLG</code></li> <li><code>NOK</code></li> <li><code>NPR</code></li> <li><code>NZD</code></li> <li><code>OMR</code></li> <li><code>PAB</code></li> <li><code>PEI</code></li> <li><code>PEN</code></li> <li><code>PES</code></li> <li><code>PGK</code></li> <li><code>PHP</code></li> <li><code>PKR</code></li> <li><code>PLN</code></li> <li><code>PLZ</code></li> <li><code>PTE</code></li> <li><code>PYG</code></li> <li><code>QAR</code></li> <li><code>RHD</code></li> <li><code>ROL</code></li> <li><code>RON</code></li> <li><code>RSD</code></li> <li><code>RUB</code></li> <li><code>RUR</code></li> <li><code>RWF</code></li> <li><code>SAR</code></li> <li><code>SBD</code></li> <li><code>SCR</code></li> <li><code>SDD</code></li> <li><code>SDG</code></li> <li><code>SDP</code></li> <li><code>SEK</code></li> <li><code>SGD</code></li> <li><code>SHP</code></li> <li><code>SIT</code></li> <li><code>SKK</code></li> <li><code>SLE</code></li> <li><code>SLL</code></li> <li><code>SOS</code></li> <li><code>SRD</code></li> <li><code>SRG</code></li> <li><code>SSP</code></li> <li><code>STD</code></li> <li><code>STN</code></li> <li><code>SUR</code></li> <li><code>SVC</code></li> <li><code>SYP</code></li> <li><code>SZL</code></li> <li><code>THB</code></li> <li><code>TJR</code></li> <li><code>TJS</code></li> <li><code>TMM</code></li> <li><code>TMT</code></li> <li><code>TND</code></li> <li><code>TOP</code></li> <li><code>TPE</code></li> <li><code>TRL</code></li> <li><code>TRY</code></li> <li><code>TTD</code></li> <li><code>TWD</code></li> <li><code>TZS</code></li> <li><code>UAH</code></li> <li><code>UAK</code></li> <li><code>UGS</code></li> <li><code>UGX</code></li> <li><code>USD</code></li> <li><code>USN</code></li> <li><code>USS</code></li> <li><code>UYI</code></li> <li><code>UYP</code></li> <li><code>UYU</code></li> <li><code>UYW</code></li> <li><code>UZS</code></li> <li><code>VEB</code></li> <li><code>VED</code></li> <li><code>VEF</code></li> <li><code>VES</code></li> <li><code>VND</code></li> <li><code>VNN</code></li> <li><code>VUV</code></li> <li><code>WST</code></li> <li><code>XAF</code></li> <li><code>XCD</code></li> <li><code>XCG</code></li> <li><code>XEU</code></li> <li><code>XFO</code></li> <li><code>XFU</code></li> <li><code>XOF</code></li> <li><code>XPF</code></li> <li><code>XRE</code></li> <li><code>YDD</code></li> <li><code>YER</code></li> <li><code>YUD</code></li> <li><code>YUM</code></li> <li><code>YUN</code></li> <li><code>YUR</code></li> <li><code>ZAL</code></li> <li><code>ZAR</code></li> <li><code>ZMK</code></li> <li><code>ZMW</code></li> <li><code>ZRN</code></li> <li><code>ZRZ</code></li> <li><code>ZWD</code></li> <li><code>ZWG</code></li> <li><code>ZWL</code></li> <li><code>ZWR</code></li></ul>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>

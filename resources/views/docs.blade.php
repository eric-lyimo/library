<!doctype html>
<html>
  <head>
    <title>library - backend task</title>
    <style type="text/css">
      body {
      	font-family: Trebuchet MS, sans-serif;
      	font-size: 15px;
      	color: #444;
      	margin-right: 24px;
      }
      
      h1	{
      	font-size: 25px;
      }
      h2	{
      	font-size: 20px;
      }
      h3	{
      	font-size: 16px;
      	font-weight: bold;
      }
      hr	{
      	height: 1px;
      	border: 0;
      	color: #ddd;
      	background-color: #ddd;
      }
      
      .app-desc {
        clear: both;
        margin-left: 20px;
      }
      .param-name {
        width: 100%;
      }
      .license-info {
        margin-left: 20px;
      }
      
      .license-url {
        margin-left: 20px;
      }
      
      .model {
        margin: 0 0 0px 20px;
      }
      
      .method {
        margin-left: 20px;
      }
      
      .method-notes	{
      	margin: 10px 0 20px 0;
      	font-size: 90%;
      	color: #555;
      }
      
      pre {
        padding: 10px;
        margin-bottom: 2px;
      }
      
      .http-method {
       text-transform: uppercase;
      }
      
      pre.get {
        background-color: #0f6ab4;
      }
      
      pre.post {
        background-color: #10a54a;
      }
      
      pre.put {
        background-color: #c5862b;
      }
      
      pre.delete {
        background-color: #a41e22;
      }
      
      .huge	{
      	color: #fff;
      }
      
      pre.example {
        background-color: #f3f3f3;
        padding: 10px;
        border: 1px solid #ddd;
      }
      
      code {
        white-space: pre;
      }
      
      .nickname {
        font-weight: bold;
      }
      
      .method-path {
        font-size: 1.5em;
        background-color: #0f6ab4;
      }
      
      .up {
        float:right;
      }
      
      .parameter {
        width: 500px;
      }
      
      .param {
        width: 500px;
        padding: 10px 0 0 20px;
        font-weight: bold;
      }
      
      .param-desc {
        width: 700px;
        padding: 0 0 0 20px;
        color: #777;
      }
      
      .param-type {
        font-style: italic;
      }
      
      .param-enum-header {
      width: 700px;
      padding: 0 0 0 60px;
      color: #777;
      font-weight: bold;
      }
      
      .param-enum {
      width: 700px;
      padding: 0 0 0 80px;
      color: #777;
      font-style: italic;
      }
      
      .field-label {
        padding: 0;
        margin: 0;
        clear: both;
      }
      
      .field-items	{
      	padding: 0 0 15px 0;
      	margin-bottom: 15px;
      }
      
      .return-type {
        clear: both;
        padding-bottom: 10px;
      }
      
      .param-header {
        font-weight: bold;
      }
      
      .method-tags {
        text-align: right;
      }
      
      .method-tag {
        background: none repeat scroll 0% 0% #24A600;
        border-radius: 3px;
        padding: 2px 10px;
        margin: 2px;
        color: #FFF;
        display: inline-block;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
  <h1>library - backend task</h1>
    <div class="app-desc"><h1>Authentication</h1>
<p>This API uses a JWT Bearer token authentication method.The token is supplied in the <code>Authorization</code> header. We prefix the token with the  keyword <code>Bearer</code> (and a space).
For example, a request to the <code>/home</code> endpoint might look like this:</p>
<pre><code>GET /api/home HTTP/1.1
Host: https://library.co.tz
Authorization: Bearer eyJhbGc.....
Connection: keep-alive
Content-Type: application/json
</code></pre>
<p>To obtain an access token, the user must log in with the provided details as seen in the <code>api/auth/login</code> endpoint documentation.</p>
<p>Additionally, the server will cache all user authorisation for up to 10 seconds after a user request. This means if user permissions are changed, it will take a short time before the user can make an authorised request. To override this behaviour, you may provide the <code>ignore-user-cache</code> header to your request, and a fresh user authorisation will be generated so timing issues may be avoided</p>
</div>
    <div class="app-desc">More information: <a href="https://helloreverb.com">https://helloreverb.com</a></div>
    <div class="app-desc">Contact Info: <a href="eric.lyimo29@gmail.com">eric.lyimo29@gmail.com</a></div>
    <div class="app-desc">Version: 1.0.0</div>
    <div class="app-desc">BasePath:/eric.lyimo29/library/1.0.0</div>
    <div class="license-info">Apache 2.0</div>
    <div class="license-url">http://www.apache.org/licenses/LICENSE-2.0.html</div>
  <h2>Access</h2>

  <h2><a name="__Methods">Methods</a></h2>
  [ Jump to <a href="#__Models">Models</a> ]

  <h3>Table of Contents </h3>
  <div class="method-summary"></div>
  <h4><a href="#Auth">Auth</a></h4>
  <ul>
  <li><a href="#createUser"><code><span class="http-method">post</span> /api/auth/register</code></a></li>
  <li><a href="#loginUser"><code><span class="http-method">post</span> /api/auth/login</code></a></li>
  </ul>
  <h4><a href="#Users">Users</a></h4>
  <ul>
  <li><a href="#books"><code><span class="http-method">get</span> /boooks</code></a></li>
  <li><a href="#popular"><code><span class="http-method">get</span> /boooks/popular</code></a></li>
  </ul>

  <h1><a name="Auth">Auth</a></h1>
  <div class="method"><a name="createUser"></a>
    <div class="method-path">
    <a class="up" href="#__Methods">Up</a>
    <pre class="post"><code class="huge"><span class="http-method">post</span> /api/auth/register</code></pre></div>
    <div class="method-summary">An api endpoint for new user registration (<span class="nickname">createUser</span>)</div>
    <div class="method-notes">Register as new user.</div>


    <h3 class="field-label">Consumes</h3>
    This API call consumes the following media types via the <span class="header">Content-Type</span> request header:
    <ul>
      <li><code>application/json</code></li>
    </ul>

    <h3 class="field-label">Request body</h3>
    <div class="field-items">
      <div class="param">body <a href="#user">user</a> (optional)</div>
      
            <div class="param-desc"><span class="param-type">Body Parameter</span> &mdash; Provide the email, password and confirm passwaord as a JSON object in order to register. </div>
                </div>  <!-- field-items -->




    <h3 class="field-label">Return type</h3>
    <div class="return-type">
      <a href="#loginResponse">loginResponse</a>
      
    </div>

    <!--Todo: process Response Object and its headers, schema, examples -->

    <h3 class="field-label">Example data</h3>
    <div class="example-data-content-type">Content-Type: application/json</div>
    <pre class="example"><code>{
  "message" : "sucessfully login!",
  "status" : "true",
  "token" : "buwT695i2V"
}</code></pre>

    <h3 class="field-label">Produces</h3>
    This API call produces the following media types according to the <span class="header">Accept</span> request header;
    the media type will be conveyed by the <span class="header">Content-Type</span> response header.
    <ul>
      <li><code>application/json</code></li>
    </ul>

    <h3 class="field-label">Responses</h3>
    <h4 class="field-label">201</h4>
    Successful login request
        <a href="#loginResponse">loginResponse</a>
    <h4 class="field-label">400</h4>
    Missing parameter, invalid parameter, server error.
        <a href="#"></a>
    <h4 class="field-label">401</h4>
    Unsuccessfull login, either username or password are incorect.
        <a href="#"></a>
  </div> <!-- method -->
  <hr/>
  <div class="method"><a name="loginUser"></a>
    <div class="method-path">
    <a class="up" href="#__Methods">Up</a>
    <pre class="post"><code class="huge"><span class="http-method">post</span> /api/auth/login</code></pre></div>
    <div class="method-summary">Obtain a JWT Token (<span class="nickname">loginUser</span>)</div>
    <div class="method-notes">Obtaining a login token can be done by providing the user <code>email</code>, <code>password</code> and <code>loginKey</code> to this endpoint. The <code>loginKey</code> will be given by Pitcrew administrators to allow usage of the Pitcrew Backend API.</div>


    <h3 class="field-label">Consumes</h3>
    This API call consumes the following media types via the <span class="header">Content-Type</span> request header:
    <ul>
      <li><code>application/json</code></li>
    </ul>

    <h3 class="field-label">Request body</h3>
    <div class="field-items">
      <div class="param">body <a href="#loginRequest">loginRequest</a> (optional)</div>
      
            <div class="param-desc"><span class="param-type">Body Parameter</span> &mdash; Provide the user email, password and loginKey as a JSON object in order to log in. </div>
                </div>  <!-- field-items -->




    <h3 class="field-label">Return type</h3>
    <div class="return-type">
      <a href="#loginResponse">loginResponse</a>
      
    </div>

    <!--Todo: process Response Object and its headers, schema, examples -->

    <h3 class="field-label">Example data</h3>
    <div class="example-data-content-type">Content-Type: application/json</div>
    <pre class="example"><code>{
  "message" : "sucessfully login!",
  "status" : "true",
  "token" : "buwT695i2V"
}</code></pre>

    <h3 class="field-label">Produces</h3>
    This API call produces the following media types according to the <span class="header">Accept</span> request header;
    the media type will be conveyed by the <span class="header">Content-Type</span> response header.
    <ul>
      <li><code>application/json</code></li>
    </ul>

    <h3 class="field-label">Responses</h3>
    <h4 class="field-label">200</h4>
    Successful login request
        <a href="#loginResponse">loginResponse</a>
    <h4 class="field-label">400</h4>
    Missing parameter, invalid parameter, server error.
        <a href="#"></a>
    <h4 class="field-label">401</h4>
    Unsuccessfull login, either username or password are incorect.
        <a href="#"></a>
  </div> <!-- method -->
  <hr/>
  <h1><a name="Users">Users</a></h1>
  <div class="method"><a name="books"></a>
    <div class="method-path">
    <a class="up" href="#__Methods">Up</a>
    <pre class="get"><code class="huge"><span class="http-method">get</span> /boooks</code></pre></div>
    <div class="method-summary">paginated list of books (<span class="nickname">books</span>)</div>
    <div class="method-notes">By passing the page parameter, this endpoint will return the list of books</div>





    <h3 class="field-label">Query parameters</h3>
    <div class="field-items">
      <div class="param">page (required)</div>
      
            <div class="param-desc"><span class="param-type">Query Parameter</span> &mdash; pass a search string to paginate the data </div>    </div>  <!-- field-items -->


    <h3 class="field-label">Return type</h3>
    <div class="return-type">
      array[<a href="#books">books</a>]
      
    </div>

    <!--Todo: process Response Object and its headers, schema, examples -->

    <h3 class="field-label">Example data</h3>
    <div class="example-data-content-type">Content-Type: application/json</div>
    <pre class="example"><code>[ {
  "year" : "2016-08-29T09:12:33.001Z",
  "name" : "Rich Dad Poor Dad",
  "publisher" : "Mkuki Na Nyota",
  "id" : 1
}, {
  "year" : "2016-08-29T09:12:33.001Z",
  "name" : "Rich Dad Poor Dad",
  "publisher" : "Mkuki Na Nyota",
  "id" : 1
} ]</code></pre>

    <h3 class="field-label">Produces</h3>
    This API call produces the following media types according to the <span class="header">Accept</span> request header;
    the media type will be conveyed by the <span class="header">Content-Type</span> response header.
    <ul>
      <li><code>application/json</code></li>
    </ul>

    <h3 class="field-label">Responses</h3>
    <h4 class="field-label">200</h4>
    return paginated books
        
    <h4 class="field-label">400</h4>
    bad input parameter
        <a href="#"></a>
  </div> <!-- method -->
  <hr/>
  <div class="method"><a name="popular"></a>
    <div class="method-path">
    <a class="up" href="#__Methods">Up</a>
    <pre class="get"><code class="huge"><span class="http-method">get</span> /boooks/popular</code></pre></div>
    <div class="method-summary">paginated list of books (<span class="nickname">popular</span>)</div>
    <div class="method-notes">By passing the page parameter, this endpoint will return the list of books</div>





    <h3 class="field-label">Query parameters</h3>
    <div class="field-items">
      <div class="param">page (required)</div>
      
            <div class="param-desc"><span class="param-type">Query Parameter</span> &mdash; pass a search string to paginate the data </div>    </div>  <!-- field-items -->


    <h3 class="field-label">Return type</h3>
    <div class="return-type">
      array[<a href="#books">books</a>]
      
    </div>

    <!--Todo: process Response Object and its headers, schema, examples -->

    <h3 class="field-label">Example data</h3>
    <div class="example-data-content-type">Content-Type: application/json</div>
    <pre class="example"><code>[ {
  "year" : "2016-08-29T09:12:33.001Z",
  "name" : "Rich Dad Poor Dad",
  "publisher" : "Mkuki Na Nyota",
  "id" : 1
}, {
  "year" : "2016-08-29T09:12:33.001Z",
  "name" : "Rich Dad Poor Dad",
  "publisher" : "Mkuki Na Nyota",
  "id" : 1
} ]</code></pre>

    <h3 class="field-label">Produces</h3>
    This API call produces the following media types according to the <span class="header">Accept</span> request header;
    the media type will be conveyed by the <span class="header">Content-Type</span> response header.
    <ul>
      <li><code>application/json</code></li>
    </ul>

    <h3 class="field-label">Responses</h3>
    <h4 class="field-label">200</h4>
    return paginated books
        
    <h4 class="field-label">400</h4>
    bad input parameter
        <a href="#"></a>
  </div> <!-- method -->
  <hr/>

  <h2><a name="__Models">Models</a></h2>
  [ Jump to <a href="#__Methods">Methods</a> ]

  <h3>Table of Contents</h3>
  <ol>
    <li><a href="#books"><code>books</code></a></li>
    <li><a href="#loginRequest"><code>loginRequest</code></a></li>
    <li><a href="#loginResponse"><code>loginResponse</code></a></li>
    <li><a href="#user"><code>user</code></a></li>
  </ol>

  <div class="model">
    <h3><a name="books"><code>books</code></a> <a class="up" href="#__Models">Up</a></h3>
    
    <div class="field-items">
      <div class="param">id </div><div class="param-desc"><span class="param-type"><a href="#integer">Integer</a></span>  format: int</div>
          <div class="param-desc"><span class="param-type">example: 1</span></div>
<div class="param">name </div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span>  </div>
          <div class="param-desc"><span class="param-type">example: Rich Dad Poor Dad</span></div>
<div class="param">year </div><div class="param-desc"><span class="param-type"><a href="#DateTime">Date</a></span>  format: date-time</div>
          <div class="param-desc"><span class="param-type">example: 2016-08-29T09:12:33.001Z</span></div>
<div class="param">publisher </div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span>  </div>
          <div class="param-desc"><span class="param-type">example: Mkuki Na Nyota</span></div>
    </div>  <!-- field-items -->
  </div>
  <div class="model">
    <h3><a name="loginRequest"><code>loginRequest</code></a> <a class="up" href="#__Models">Up</a></h3>
    
    <div class="field-items">
      <div class="param">email </div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> The email address of the user. </div>
          <div class="param-desc"><span class="param-type">example: test@example.com</span></div>
<div class="param">password </div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> The password of the user. </div>
          <div class="param-desc"><span class="param-type">example: mypassword123!</span></div>
    </div>  <!-- field-items -->
  </div>
  <div class="model">
    <h3><a name="loginResponse"><code>loginResponse</code></a> <a class="up" href="#__Models">Up</a></h3>
    
    <div class="field-items">
      <div class="param">status (optional)</div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> status for the action (true or false). </div>
          <div class="param-desc"><span class="param-type">example: true</span></div>
<div class="param">message (optional)</div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> a message indicating an activivty status. </div>
          <div class="param-desc"><span class="param-type">example: sucessfully login!</span></div>
<div class="param">token (optional)</div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> a message indicating an activivty status. </div>
          <div class="param-desc"><span class="param-type">example: buwT695i2V</span></div>
    </div>  <!-- field-items -->
  </div>
  <div class="model">
    <h3><a name="user"><code>user</code></a> <a class="up" href="#__Models">Up</a></h3>
    
    <div class="field-items">
      <div class="param">id (optional)</div><div class="param-desc"><span class="param-type"><a href="#integer">Integer</a></span> The user Id. </div>
          <div class="param-desc"><span class="param-type">example: 1</span></div>
<div class="param">name (optional)</div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> A username. </div>
          <div class="param-desc"><span class="param-type">example: admin</span></div>
<div class="param">email (optional)</div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> The email used as suername during login. </div>
          <div class="param-desc"><span class="param-type">example: admin@library.co.tz</span></div>
<div class="param">password (optional)</div><div class="param-desc"><span class="param-type"><a href="#string">String</a></span> The password of the user. </div>
          <div class="param-desc"><span class="param-type">example: mypassword123!</span></div>
    </div>  <!-- field-items -->
  </div>
  </body>
</html>

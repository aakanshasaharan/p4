<nav class ="navbar navbar-default">
  <div class ="container">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://p1.aakanshasaharan.com">aaKanShaSaharan</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">

            @if(Auth::check())
            <li><a href="/">Home</a></li>
            <li><a href="/recipes/create">Add Recipe</a></li>
            <li><a href='/logout'>Log out</a></li>

            @else
              <li><a href="/">Home</a></li>
              <li><a href="/register">Register</a></li>
              <li><a href="/login">Login</a></li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
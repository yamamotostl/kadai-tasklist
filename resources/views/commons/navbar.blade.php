<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">TaskList</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav navbar-right">
                <!--新規タスクの登録はログイン後のみで表示-->
                <!--<li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの登録', [], ['class' => 'nav-link']) !!}</li>-->
                <!--以下はいずれもログイン前のみ表示させる予定-->
                <li>{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item"><a href="#" class="nav-link">Login</a></li>
            </ul>
        </div>
    </nav>
</header>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{ $header }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong>{{ $pageLocation }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        @if(strlen($actionArea) > 0)
        <div class="title-action">
            <a href="/tickets/create" class="btn btn-primary">{{ $actionArea }}</a>
        </div>
        @endif
    </div>
</div>


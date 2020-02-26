@extends('layout.master')

@section('css')
<link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.1/build/styles/default.min.css">
@endsection

@section('content')
<div class="user-info text-left mt-5">
	<span>
		Name: <strong>{{ $worldlink->getField('full_name') }}</strong>
	</span>
	<span>
		Username: <strong>{{ $worldlink->getField('user') }}</strong>
	</span>
	<span>
		Current Plan: <strong>{{ $worldlink->getField('current_plan') }}</strong>
	</span>
	<span>
		Days Left: <strong>{{ $worldlink->getField('days_left') }}</strong>
	</span>
	<span>
		Expires at: <strong>{{ strftime("%B %d, %Y", strtotime($worldlink->getField('expires_at'))) }}</strong>
	</span>
</div>

<pre class="text-left json-code mt-4">
<code class="lang-json">
{{ json_encode(json_decode($response), JSON_PRETTY_PRINT) }}
</code>
</pre>
<a href="{{ route('home') }}" class="btn btn-worldlink">Query Another</a>
@endsection

@section('javascript')
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.1/build/highlight.min.js"></script>
<script>
	hljs.initHighlightingOnLoad();
</script>
@endsection
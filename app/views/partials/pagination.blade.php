
<?php
    $presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
    $trans = $environment->getTranslator();
?>


@if ($paginator->getLastPage() > 1)
 <nav role="navigation">
	<ul class="cd-pagination no-space animated-buttons custom-icons">
	<li><a href="{{ $paginator->getUrl(1) }}" class="{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}"> Previous</a></li>
	@for ($i = 1; $i <= $paginator->getLastPage(); $i++)
	<a href="{{ $paginator->getUrl($i) }}" class="{{ ($paginator->getCurrentPage() == $i) ? 'current' : '' }}">{{ $i }}</a>
	@endfor
	<li><a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" class="item{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}"> Next</a></li>
	</ul>
</nav>
@endif

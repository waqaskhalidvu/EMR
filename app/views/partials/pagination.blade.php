
<?php
    $presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
    $trans = $environment->getTranslator();
?>

@if ($paginator->getLastPage() > 1)
    <?php
        $start = $paginator->getCurrentPage() - 3; // show 3 pagination links before current
        $end = $paginator->getCurrentPage() + 3; // show 3 pagination links after current
        if($start < 1) $start = 1; // reset start to 1
        if($end >= $paginator->getLastPage() ) $end = $paginator->getLastPage(); // reset end to last page
    ?>
    <nav role="navigation">
    	<ul class="cd-pagination no-space animated-buttons custom-icons">
            <li><a style="text-decoration: none" class="{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}" href="{{ $paginator->getUrl(1) }}">Prev</a></li>
            @if($start>1)
                <li><a style="text-decoration: none" href="{{ $paginator->getUrl(1) }}">{{1}}</a> <span>...</span> </li>
            @endif
            @for ($i = $start; $i <= $end; $i++)
                <li><a style="text-decoration: none" class="{{ ($paginator->getCurrentPage() == $i) ? ' current' : '' }}" href="{{ $paginator->getUrl($i) }}">{{$i}}</a></li>
            @endfor
            @if($end<$paginator->getLastPage())
               <li><span>...</span> <a style="text-decoration: none" href="{{ $paginator->getUrl($paginator->getLastPage()) }}">{{$paginator->getLastPage()}}</a></li>
            @endif
            <li><a style="text-decoration: none" class="{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}" href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}"> Next </a></li>
        </ul>
    </nav>
@endif

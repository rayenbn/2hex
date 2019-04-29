<div class="m-widget5__item">
    <div class="m-widget5__content">
        <div class="m-widget5__pic">
            <img class="m-widget7__img" src="{{ $article->image }}" alt="2HEX experience">
        </div>
        <div class="m-widget5__section">
            <h4 class="m-widget5__title">
                <a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a>
            </h4>
            <span class="m-widget5__desc">
                {{ str_limit(strip_tags($article->content), 60,'...') }}
            </span>
            <div class="m-widget5__info">
                <span class="m-widget5__author">
                    Author:
                </span>
                <span class="m-widget5__info-author m--font-info">
                    {{ $article->author->name }}
                </span>
                <span class="m-widget5__info-label">
                    Released:
                </span>
                <span class="m-widget5__info-date m--font-info">
                    {{ date('d.m.Y', strtotime($article->created_at)) }}
                </span>
            </div>
        </div>
    </div>
    <div class="m-widget5__content">
        @if(auth()->user()->isAdmin())
            <form action="{{ route('blog.destroy', $article->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{ route('blog.edit', $article->id) }}" class="btn btn-outline-warning">Edit</a>
                <button type="submit" class="btn btn-outline-danger">Remove</button>
            </form>
        @endif
    </div>
</div>
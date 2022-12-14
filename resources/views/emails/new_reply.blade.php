@component('emails::message')
    **{{ $reply->author()->name() }}** replied to your thread **{{ $reply->thread()->title() }}**.
@endcomponent

@component('email::panel')
    {{ $reply->excerpt(200) }}
@endcomponent

@component('emails::button', ['url' => route(
    'threads.show', $reply->replyAble()->category->slug(), $reply->replyAble()->slug()
    )])
    View Reply
@endcomponent

Thanks,

{{ config('app.name') }}
@endcomponent


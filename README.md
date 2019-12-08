## Installation notes

```
composer install
artisan ide-helper:generate
artisan ide-helper:meta
```

## Steps before announcement

* Test blog post in [twitter card validator](https://cards-dev.twitter.com/validator)
* Test blog post in [facebook debugger](https://developers.facebook.com/tools/debug/sharing/)

## Steps after launching website

* [Tell google about it](https://support.google.com/webmasters/answer/7451001) by submitting 
the URL of the auto generated /sitemap.txt file

## Syntax

### Paragraph
```
@component('p')
@endcomponent
```

### Code block
```
@component('code')
@endcomponent
```

### Inline code
```
@component('inline-code') 
@endcomponent
```

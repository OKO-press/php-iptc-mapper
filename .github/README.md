![OKO dev](logo.png "OKO dev")

# IPTC meta mapper 

Usage example:

```php
use OKO\IptcMapper\Map as IptcMapper;

$imageMeta = new IptcMapper("20210512_AKU_protest-XR_001.jpg");
$title = $imageMeta->title;
```

## Available fields

| Field             | Type          | Format                |
| ------------------|---------------|-----------------------|
| title             | string        |                       |
| description       | string        |                       |
| keywords          | array         | array of strings      |
| creator           | string        |                       |
| city              | string        |                       |
| voivodeship       | string        |                       |
| country_code      | string        | ISO 3166 (Alpha-3)    |
| country           | string        |                       |
| event             | string        |                       |
| copyright_note    | string        |                       |
| date_created      | string        | YYYY-MM-DD            |
| time_created      | string        | HH:MM:SS              |

## Tests

```bash
composer test
```

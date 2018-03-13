
```php
$df = new \Lander931\DF\DF(true);
$file_system = $df->info('/dev/sda1');

print_r($file_system);
```
####Output
```text
Lander931\DF\DFFileSystem Object
(
    [name] => /dev/sda1
    [size] => 472M
    [used] => 106M
    [available] => 342M
    [percent_available] => 24
    [mounted_on] => /boot
)
```

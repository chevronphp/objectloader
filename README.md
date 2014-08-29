# chevron.objectloader

objectloader is a simple utility to recurse over a directory and load each php file. If
the file returns a callable, it's called and passed the provided object. This is useful
for populating a Di, ServiceLocator, or an Event Queue

Peruse the tests or, if present, the examples directory to see usage.

See [packagist](https://packagist.org/packages/chevron/objectloader) for version/installation info. At the moment, I recommend using `"chevron/objectloader":"~1.0"`.

[![Latest Stable Version](https://poser.pugx.org/chevron/objectloader/v/stable.svg)](https://packagist.org/packages/chevron/objectloader)
[![Build Status](https://travis-ci.org/chevronphp/objectloader.svg?branch=master)](https://travis-ci.org/chevronphp/objectloader)





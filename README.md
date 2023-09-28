# WP Benchy

A plugin to assist with running benchmark tests. For more information about the approaches used here, see our article about [how to benchmark WordPress sites](https://pressable.com/benchmarking-wordpress).

*(Yes, sending you to this post isn't the best experience, but it's good enough for now. PRs open if you want to make this readme better.)*

## Installing

**Don't try to just install this as-is from the repo - you'll be missing dependencies.**

For an installable plugin zip, download the latest release.

## Building

You're going to need Composer and NPM.

1. `cd wp-benchy`
2. `composer install`
3. `cd scripts`
4. `npm start` from dev. `npm run build` for prod.

## Contributing

Contributions are wide open. Go wild.

A few things this could use:

- Write better docs
- A UI that doesn't suck.
- More tests

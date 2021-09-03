# lm_hash
Generate an LM hash with PHP.

Over the years, the LM hash algorithm has gotten a lot less recognition as it's a broken and severely outdated algorithm. It is still supported by Windows systems to this day for backward compatibility purposes but is disabled by default. In addition to this, PHP has also evolved over the years too. There is no native support to generate LM hashes in PHP so a function is required for the job.

The original method was to write a full length algorithm which was several kilobytes large. Now the mcrypt library is deprecated and no longer bundled with PHP 7.2 (November 2017). It is still available as an externally available module.

dnl $Id: $
dnl config.m4 for extension fastlz

PHP_ARG_ENABLE(fastlz, whether to enable fastlz support,
[  --enable-fastlz           Enable fastlz support])

if test "$PHP_FASTLZ" != "no"; then

  fastlz_sources="fastlz.c\
					php_fastlz.c"

  PHP_NEW_EXTENSION(fastlz, $fastlz_sources, $ext_shared)
fi

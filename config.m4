dnl $Id: $
dnl config.m4 for extension fastlz

PHP_ARG_ENABLE(fastlz, whether to enable fastlz support,
[  --enable-fastlz           Enable fastlz support])

AC_MSG_CHECKING([for apc includes])
  if test -f "$phpincludedir/ext/apc/apc_serializer.h"; then
      apc_inc_path="$phpincludedir"
      AC_MSG_RESULT([$apc_inc_path])
      AC_DEFINE(HAVE_APC_SUPPORT,1,[Whether to enable apc support])
  else
      AC_MSG_RESULT([not found])
fi

if test "$PHP_FASTLZ" != "no"; then

  fastlz_sources="libfastlz/fastlz.c\
					php_fastlz.c"

  PHP_NEW_EXTENSION(fastlz, $fastlz_sources, $ext_shared)
  PHP_ADD_BUILD_DIR([$ext_builddir/libfastlz])
fi

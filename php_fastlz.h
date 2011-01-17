
/* $Id: php_fastlz.h 305998 2010-12-06 09:41:04Z gopalv $ */

#ifndef PHP_FASTLZ_H
#define PHP_FASTLZ_H

extern zend_module_entry fastlz_module_entry;
#define phpext_fastlz_ptr &fastlz_module_entry

#define PHP_FASTLZ_VERSION "0.0.1"

#ifdef PHP_WIN32
#define PHP_FASTLZ_API __declspec(dllexport)
#else
#define PHP_FASTLZ_API
#endif

#ifdef ZTS
#include "TSRM.h"
#endif

PHP_MINIT_FUNCTION(fastlz);
PHP_MSHUTDOWN_FUNCTION(fastlz);
PHP_MINFO_FUNCTION(fastlz);


/* {{{ zend_fastlz_globals */
ZEND_BEGIN_MODULE_GLOBALS(fastlz)
	/* configuration parameters */
	long compression_level;		/* compression level */
ZEND_END_MODULE_GLOBALS(fastlz)
/* }}} */

/* {{{ extern fastlz_globals */
ZEND_EXTERN_MODULE_GLOBALS(fastlz)
/* }}} */

#ifdef ZTS
#define FASTLZ_G(v) TSRMG(fastlz_globals_id, zend_fastlz_globals *, v)
#else
#define FASTLZ_G(v) (fastlz_globals.v)
#endif

#endif	/* PHP_FASTLZ_H */


/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim>600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */

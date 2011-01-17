
#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include "php.h"
#include "php_ini.h"
#include "php_scandir.h"
#include "zend_globals.h"
#include "zend_ini_scanner.h"
#include "zend_hash.h"
#include "ext/standard/info.h"
#include "SAPI.h"

#include "php_fastlz.h"

/* {{{ fastlz globals 
 *
 * true globals, no need for thread safety here 
 */
/* }}} */

/* {{{ PHP_FUNCTION declarations */
PHP_FUNCTION(fastlz_compress);
PHP_FUNCTION(fastlz_uncompress);
/* }}} */

/* {{{ ZEND_DECLARE_MODULE_GLOBALS(fastlz) */
ZEND_DECLARE_MODULE_GLOBALS(fastlz)
/* }}} */

/* {{{ php_fastlz_init_globals */
static void php_fastlz_init_globals(zend_fastlz_globals* fastlz_globals TSRMLS_DC)
{
}
/* }}} */

/* {{{ php_fastlz_shutdown_globals */
static void php_fastlz_shutdown_globals(zend_fastlz_globals* fastlz_globals TSRMLS_DC)
{
	/* nothing ? */
}
/* }}} */

/* {{{ ini entries */
PHP_INI_BEGIN()
STD_PHP_INI_ENTRY("fastlz.compression", "1",  PHP_INI_SYSTEM, OnUpdateLong,    compression_level,   zend_fastlz_globals, fastlz_globals)
PHP_INI_END()
/* }}} */

/* {{{ arginfo static macro */
#if PHP_MAJOR_VERSION > 5 || PHP_MAJOR_VERSION == 5 && PHP_MINOR_VERSION >= 3
#define FASTLZ_ARGINFO_STATIC
#else
#define FASTLZ_ARGINFO_STATIC static
#endif
/* }}} */

/* {{{ arginfo */
FASTLZ_ARGINFO_STATIC
ZEND_BEGIN_ARG_INFO(php_fastlz_compress_arginfo, 0)
    ZEND_ARG_INFO(0, key)
ZEND_END_ARG_INFO()

FASTLZ_ARGINFO_STATIC
ZEND_BEGIN_ARG_INFO(php_fastlz_uncompress_arginfo, 0)
    ZEND_ARG_INFO(0, key)
ZEND_END_ARG_INFO()
/* }}} */


/* {{{ fastlz_functions[]
 *
 * Every user visible function must have an entry in fastlz_functions[].
 */
zend_function_entry fastlz_functions[] = {
	PHP_FE(fastlz_compress,               php_fastlz_compress_arginfo)
	PHP_FE(fastlz_uncompress,             php_fastlz_uncompress_arginfo)
	{NULL, NULL, NULL}	/* Must be the last line in fastlz_functions[] */
};
/* }}} */

/* {{{ fastlz_module_entry
 */
zend_module_entry fastlz_module_entry = {
	STANDARD_MODULE_HEADER,
	"fastlz",
	fastlz_functions,
	PHP_MINIT(fastlz),
	PHP_MSHUTDOWN(fastlz),
	NULL,
	NULL,
	PHP_MINFO(fastlz),
#if ZEND_MODULE_API_NO >= 20010901
	PHP_FASTLZ_VERSION,
#endif
	STANDARD_MODULE_PROPERTIES
};
/* }}} */

#ifdef COMPILE_DL_FASTLZ
ZEND_GET_MODULE(fastlz)
#endif

/* {{{ PHP_MINIT_FUNCTION
 */
PHP_MINIT_FUNCTION(hidef)
{
	ZEND_INIT_MODULE_GLOBALS(fastlz, php_fastlz_init_globals, php_fastlz_shutdown_globals);

	REGISTER_INI_ENTRIES();
	
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MSHUTDOWN_FUNCTION
 *  */
PHP_MSHUTDOWN_FUNCTION(fastlz)
{
#ifdef ZTS
	ts_free_id(fastlz_globals_id);
#else
	php_fastlz_shutdown_globals(&fastlz_globals);
#endif

	UNREGISTER_INI_ENTRIES();
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MINFO_FUNCTION
 */
PHP_MINFO_FUNCTION(fastlz)
{
	int module_number = zend_module->module_number;
	
	php_info_print_table_start();

	php_info_print_table_header(2, "fastlz support", "enabled");
	php_info_print_table_row(2, "version", PHP_FASTLZ_VERSION);
	php_info_print_table_end();
}
/* }}} */

/* {{{ proto string fastlz_compress(string value)
 */
PHP_FUNCTION(fastlz_fetch) 
{
	char *strkey;
	int strkey_len;

	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &strkey, &strkey_len) == FAILURE)
	{
		return;
	}
}
/* }}} */

/* {{{ proto string fastlz_uncompress(string key)
 */
PHP_FUNCTION(fastlz_uncompress) 
{
	char *strkey;
	int strkey_len;

	if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &strkey, &strkey_len) == FAILURE)
	{
		return;
	}
}
/* }}} */

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim>600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */

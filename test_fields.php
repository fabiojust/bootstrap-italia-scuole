<?php
define('_JEXEC', 1);
define('JPATH_BASE', __DIR__);
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

$app = JFactory::getApplication('site');
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('a.*')
      ->from($db->quoteName('#__content', 'a'))
      ->where($db->quoteName('a.state') . ' = 1')
      ->setLimit(1);
$db->setQuery($query);
$sede = $db->loadObject();

JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_fields/models', 'FieldsModel');
$fields = FieldsHelper::getFields('com_content.article', $sede, true);
foreach ($fields as $field) {
    if ($field->name === 'indirizzo') {
        echo "Found indirizzo: " . $field->value . "\n";
    }
}
echo "Done\n";

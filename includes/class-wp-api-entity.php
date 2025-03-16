<?php

class CRM_WordPress_Api_Entity
{
	/**
	 * @param bool $checkPermissions
	 * @return DAOGetAction
	 */
	public static function get(string $entityName, $checkPermissions = TRUE)
	{
		return (new Civi\Api4\Generic\DAOGetAction($entityName, __FUNCTION__))
			->setCheckPermissions($checkPermissions);
	}

	/**
	 * @param bool $checkPermissions
	 * @return DAOGetFieldsAction
	 */
	public static function getFields(string $entityName, $checkPermissions = TRUE)
	{
		return (new Civi\Api4\Generic\DAOGetFieldsAction($entityName, __FUNCTION__))
			->setCheckPermissions($checkPermissions);
	}

	/**
	 * @param bool $checkPermissions
	 * @return AutocompleteAction
	 */
	public static function autocomplete(string $entityName, $checkPermissions = TRUE)
	{
		return (new Civi\Api4\Generic\AutocompleteAction($entityName, __FUNCTION__))
			->setCheckPermissions($checkPermissions);
	}


  /**
   * Returns a list of permissions needed to access the various actions in this api.
   *
   * @return array
   */
  public static function permissions($entityName) {
    $permissions = \CRM_Core_Permission::getEntityActionPermissions();

    // For legacy reasons the permissions are keyed by lowercase entity name
    $lcentity = \CRM_Core_DAO_AllCoreTables::convertEntityNameToLower($entityName);
    // Merge permissions for this entity with the defaults
    return ($permissions[$lcentity] ?? []) + $permissions['default'];
  }

  /**
   * @return \Civi\Api4\Action\GetLinks
   */
  public static function getLinks(string $entity_type, bool $checkPermissions = TRUE) {
    return (new \Civi\Api4\Action\GetLinks($entity_type, __FUNCTION__))
      ->setCheckPermissions($checkPermissions);
  }

  /**
   * @param string $entity_type
   * @param bool $checkPermissions
   * @return \Civi\Api4\Action\GetActions
   */
  public static function getActions(string $entity_type, $checkPermissions = TRUE) {
    return (new Civi\Api4\Action\GetActions($entity_type, __FUNCTION__))
      ->setCheckPermissions($checkPermissions);
  }
};

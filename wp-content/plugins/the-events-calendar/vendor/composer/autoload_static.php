<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcd0cd91306ca46f339db5445aa4762d0
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tribe\\Events\\' => 13,
            'TEC\\Events\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tribe\\Events\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tribe',
        ),
        'TEC\\Events\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Events',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'TEC\\Events\\Custom_Tables\\V1\\Activation' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Activation.php',
        'TEC\\Events\\Custom_Tables\\V1\\Events\\Occurrences\\Max_Recurrence' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Events/Occurrences/Max_Recurrence.php',
        'TEC\\Events\\Custom_Tables\\V1\\Events\\Occurrences\\Max_Recurrence_Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Events/Occurrences/Max_Recurrence_Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Events\\Occurrences\\Occurrences_Generator' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Events/Occurrences/Occurrences_Generator.php',
        'TEC\\Events\\Custom_Tables\\V1\\Feedback\\Feedback_Interface' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Feedback/Feedback_Interface.php',
        'TEC\\Events\\Custom_Tables\\V1\\Feedback\\Google_Form_Feedback' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Feedback/Google_Form_Feedback.php',
        'TEC\\Events\\Custom_Tables\\V1\\Feedback\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Feedback/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Full_Activation_Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Full_Activation_Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Health_Check' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Health_Check.php',
        'TEC\\Events\\Custom_Tables\\V1\\Integrations\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Integrations/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Admin\\Phase_View_Renderer' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Admin/Phase_View_Renderer.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Admin\\Progress_Modal' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Admin/Progress_Modal.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Admin\\Template' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Admin/Template.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Admin\\Upgrade_Tab' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Admin/Upgrade_Tab.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Ajax' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Ajax.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Asset_Loader' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Asset_Loader.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\CSV_Report\\Download_Report_Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/CSV_Report/Download_Report_Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\CSV_Report\\File_Download' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/CSV_Report/File_Download.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Events' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Events.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Expected_Migration_Exception' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Expected_Migration_Exception.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Maintenance_Mode' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Maintenance_Mode.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Migration_Exception' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Migration_Exception.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Process' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Process.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Process_Worker' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Process_Worker.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Reports\\Event_Report' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Reports/Event_Report.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Reports\\Event_Report_Categories' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Reports/Event_Report_Categories.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Reports\\Site_Report' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Reports/Site_Report.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\State' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/State.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Strategies\\Null_Migration_Strategy' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Strategies/Null_Migration_Strategy.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Strategies\\Single_Event_Migration_Strategy' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Strategies/Single_Event_Migration_Strategy.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\Strategies\\Strategy_Interface' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/Strategies/Strategy_Interface.php',
        'TEC\\Events\\Custom_Tables\\V1\\Migration\\String_Dictionary' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Migration/String_Dictionary.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Builder' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Builder.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Event' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Event.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\Boolean_Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/Boolean_Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\Date_Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/Date_Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\End_Date_Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/End_Date_Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\Integer_Key_Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/Integer_Key_Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\Numeric_Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/Numeric_Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\Text_Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/Text_Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Formatters\\Timezone_Formatter' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Formatters/Timezone_Formatter.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Model' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Model.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Model_Date_Attributes' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Model_Date_Attributes.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Occurrence' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Occurrence.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Post_Model' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Post_Model.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Duration' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Duration.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\End_Date' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/End_Date.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\End_Date_UTC' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/End_Date_UTC.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Ignore_Validator' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Ignore_Validator.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Integer_Key' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Integer_Key.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Occurrence_Duration' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Occurrence_Duration.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Positive_Integer' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Positive_Integer.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Present' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Present.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Range_Dates' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Range_Dates.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Start_Date' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Start_Date.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Start_Date_UTC' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Start_Date_UTC.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\String_Validator' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/String_Validator.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Valid_Date' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Valid_Date.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Valid_Event' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Valid_Event.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Valid_Event_Model' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Valid_Event_Model.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Valid_Timezone' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Valid_Timezone.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Validator' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Validator.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\ValidatorInterface' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/ValidatorInterface.php',
        'TEC\\Events\\Custom_Tables\\V1\\Models\\Validators\\Whole_Number' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Models/Validators/Whole_Number.php',
        'TEC\\Events\\Custom_Tables\\V1\\Notices' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Notices.php',
        'TEC\\Events\\Custom_Tables\\V1\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Provider_Contract' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Provider_Contract.php',
        'TEC\\Events\\Custom_Tables\\V1\\Repository\\Events' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Repository/Events.php',
        'TEC\\Events\\Custom_Tables\\V1\\Repository\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Repository/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Schema_Builder\\Abstract_Custom_Field' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Schema_Builder/Abstract_Custom_Field.php',
        'TEC\\Events\\Custom_Tables\\V1\\Schema_Builder\\Abstract_Custom_Table' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Schema_Builder/Abstract_Custom_Table.php',
        'TEC\\Events\\Custom_Tables\\V1\\Schema_Builder\\Abstract_Schema_Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Schema_Builder/Abstract_Schema_Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Schema_Builder\\Field_Schema_Interface' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Schema_Builder/Field_Schema_Interface.php',
        'TEC\\Events\\Custom_Tables\\V1\\Schema_Builder\\Schema_Builder' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Schema_Builder/Schema_Builder.php',
        'TEC\\Events\\Custom_Tables\\V1\\Schema_Builder\\Schema_Provider_Interface' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Schema_Builder/Schema_Provider_Interface.php',
        'TEC\\Events\\Custom_Tables\\V1\\Schema_Builder\\Table_Schema_Interface' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Schema_Builder/Table_Schema_Interface.php',
        'TEC\\Events\\Custom_Tables\\V1\\Tables\\Events' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Tables/Events.php',
        'TEC\\Events\\Custom_Tables\\V1\\Tables\\Occurrences' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Tables/Occurrences.php',
        'TEC\\Events\\Custom_Tables\\V1\\Tables\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Tables/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_Core_Tables' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_Core_Tables.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_Database_Transactions' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_Database_Transactions.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_Dates_Representation' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_Dates_Representation.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_Observable_Filtering' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_Observable_Filtering.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_Reflection' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_Reflection.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_String_Dictionary' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_String_Dictionary.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_Timezones' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_Timezones.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_Unbound_Queries' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_Unbound_Queries.php',
        'TEC\\Events\\Custom_Tables\\V1\\Traits\\With_WP_Query_Introspection' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Traits/With_WP_Query_Introspection.php',
        'TEC\\Events\\Custom_Tables\\V1\\Updates\\Controller' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Updates/Controller.php',
        'TEC\\Events\\Custom_Tables\\V1\\Updates\\Events' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Updates/Events.php',
        'TEC\\Events\\Custom_Tables\\V1\\Updates\\Meta_Watcher' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Updates/Meta_Watcher.php',
        'TEC\\Events\\Custom_Tables\\V1\\Updates\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Updates/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\Updates\\Requests' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Updates/Requests.php',
        'TEC\\Events\\Custom_Tables\\V1\\Views\\V2\\By_Day_View_Compatibility' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Views/V2/By_Day_View_Compatibility.php',
        'TEC\\Events\\Custom_Tables\\V1\\Views\\V2\\Customizer_Compatibility' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Views/V2/Customizer_Compatibility.php',
        'TEC\\Events\\Custom_Tables\\V1\\Views\\V2\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/Views/V2/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Custom_Tables_Meta_Query' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Custom_Tables_Meta_Query.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Custom_Tables_Query' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Custom_Tables_Query.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Modifiers\\Base_Modifier' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Modifiers/Base_Modifier.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Modifiers\\Events_Admin_List_Modifier' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Modifiers/Events_Admin_List_Modifier.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Modifiers\\Events_Only_Modifier' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Modifiers/Events_Only_Modifier.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Modifiers\\WP_Query_Modifier' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Modifiers/WP_Query_Modifier.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Monitors\\Custom_Tables_Query_Monitor' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Monitors/Custom_Tables_Query_Monitor.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Monitors\\Query_Monitor' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Monitors/Query_Monitor.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Monitors\\WP_Query_Monitor' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Monitors/WP_Query_Monitor.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Provider' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Provider.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Redirection_Schema' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Redirection_Schema.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Repository\\Custom_Tables_Query_Filters' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Repository/Custom_Tables_Query_Filters.php',
        'TEC\\Events\\Custom_Tables\\V1\\WP_Query\\Repository\\Query_Replace' => __DIR__ . '/../..' . '/src/Events/Custom_Tables/V1/WP_Query/Repository/Query_Replace.php',
        'TEC\\Events\\Editor\\Full_Site\\Hooks' => __DIR__ . '/../..' . '/src/Events/Editor/Full_Site/Hooks.php',
        'TEC\\Events\\Editor\\Full_Site\\Provider' => __DIR__ . '/../..' . '/src/Events/Editor/Full_Site/Provider.php',
        'TEC\\Events\\Editor\\Full_Site\\Templates' => __DIR__ . '/../..' . '/src/Events/Editor/Full_Site/Templates.php',
        'TEC\\Events\\Installer\\Provider' => __DIR__ . '/../..' . '/src/Events/Installer/Provider.php',
        'TEC\\Events\\Integrations\\Integration_Abstract' => __DIR__ . '/../..' . '/src/Events/Integrations/Integration_Abstract.php',
        'TEC\\Events\\Integrations\\Plugins\\Plugin_Integration' => __DIR__ . '/../..' . '/src/Events/Integrations/Plugins/Plugin_Integration.php',
        'TEC\\Events\\Integrations\\Plugins\\WordPress_SEO\\Events_Schema' => __DIR__ . '/../..' . '/src/Events/Integrations/Plugins/WordPress_SEO/Events_Schema.php',
        'TEC\\Events\\Integrations\\Plugins\\WordPress_SEO\\Provider' => __DIR__ . '/../..' . '/src/Events/Integrations/Plugins/WordPress_SEO/Provider.php',
        'TEC\\Events\\Integrations\\Provider' => __DIR__ . '/../..' . '/src/Events/Integrations/Provider.php',
        'TEC\\Events\\Integrations\\Themes\\Theme_Integration' => __DIR__ . '/../..' . '/src/Events/Integrations/Themes/Theme_Integration.php',
        'TEC\\Events\\Legacy\\Views\\V1\\Provider' => __DIR__ . '/../..' . '/src/Events/Legacy/Views/V1/Provider.php',
        'Tribe\\Events\\Admin\\Filter_Bar\\Provider' => __DIR__ . '/../..' . '/src/Tribe/Admin/Filter_Bar/Provider.php',
        'Tribe\\Events\\Admin\\Notice\\Full_Site_Editor' => __DIR__ . '/../..' . '/src/Tribe/Admin/Notice/Full_Site_Editor.php',
        'Tribe\\Events\\Admin\\Notice\\Install_Event_Tickets' => __DIR__ . '/../..' . '/src/Tribe/Admin/Notice/Install_Event_Tickets.php',
        'Tribe\\Events\\Admin\\Notice\\Legacy_Views_Deprecation' => __DIR__ . '/../..' . '/src/Tribe/Admin/Notice/Legacy_Views_Deprecation.php',
        'Tribe\\Events\\Admin\\Notice\\Legacy_Views_Updated' => __DIR__ . '/../..' . '/src/Tribe/Admin/Notice/Legacy_Views_Updated.php',
        'Tribe\\Events\\Admin\\Notice\\Marketing' => __DIR__ . '/../..' . '/src/Tribe/Admin/Notice/Marketing.php',
        'Tribe\\Events\\Admin\\Notice\\Timezones' => __DIR__ . '/../..' . '/src/Tribe/Admin/Notice/Timezones.php',
        'Tribe\\Events\\Admin\\Notice\\Update' => __DIR__ . '/../..' . '/src/Tribe/Admin/Notice/Update.php',
        'Tribe\\Events\\Admin\\Provider' => __DIR__ . '/../..' . '/src/Tribe/Admin/Provider.php',
        'Tribe\\Events\\Admin\\Settings' => __DIR__ . '/../..' . '/src/Tribe/Admin/Settings.php',
        'Tribe\\Events\\Aggregator\\Processes\\Batch_Imports' => __DIR__ . '/../..' . '/src/Tribe/Aggregator/Processes/Batch_Imports.php',
        'Tribe\\Events\\Aggregator\\Record\\Batch_Queue' => __DIR__ . '/../..' . '/src/Tribe/Aggregator/Record/Batch_Queue.php',
        'Tribe\\Events\\Collections\\Lazy_Post_Collection' => __DIR__ . '/../..' . '/src/Tribe/Collections/Lazy_Post_Collection.php',
        'Tribe\\Events\\Editor\\Blocks\\Archive_Events' => __DIR__ . '/../..' . '/src/Tribe/Editor/Blocks/Archive_Events.php',
        'Tribe\\Events\\Editor\\Hooks' => __DIR__ . '/../..' . '/src/Tribe/Editor/Hooks.php',
        'Tribe\\Events\\Editor\\Objects\\Editor_Object_Interface' => __DIR__ . '/../..' . '/src/Tribe/Editor/Objects/Editor_Object_Interface.php',
        'Tribe\\Events\\Editor\\Objects\\Event' => __DIR__ . '/../..' . '/src/Tribe/Editor/Objects/Event.php',
        'Tribe\\Events\\Event_Status\\Admin_Template' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Admin_Template.php',
        'Tribe\\Events\\Event_Status\\Classic_Editor' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Classic_Editor.php',
        'Tribe\\Events\\Event_Status\\Compatibility\\Events_Control_Extension\\JSON_LD' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Compatibility/Events_Control_Extension/JSON_LD.php',
        'Tribe\\Events\\Event_Status\\Compatibility\\Events_Control_Extension\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Compatibility/Events_Control_Extension/Service_Provider.php',
        'Tribe\\Events\\Event_Status\\Compatibility\\Filter_Bar\\Detect' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Compatibility/Filter_Bar/Detect.php',
        'Tribe\\Events\\Event_Status\\Compatibility\\Filter_Bar\\Events_Status_Filter' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Compatibility/Filter_Bar/Events_Status_Filter.php',
        'Tribe\\Events\\Event_Status\\Compatibility\\Filter_Bar\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Compatibility/Filter_Bar/Service_Provider.php',
        'Tribe\\Events\\Event_Status\\Event_Meta' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Event_Meta.php',
        'Tribe\\Events\\Event_Status\\Event_Status_Provider' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Event_Status_Provider.php',
        'Tribe\\Events\\Event_Status\\JSON_LD' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/JSON_LD.php',
        'Tribe\\Events\\Event_Status\\Models\\Event' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Models/Event.php',
        'Tribe\\Events\\Event_Status\\Status_Labels' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Status_Labels.php',
        'Tribe\\Events\\Event_Status\\Template' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Template.php',
        'Tribe\\Events\\Event_Status\\Template_Modifications' => __DIR__ . '/../..' . '/src/Tribe/Event_Status/Template_Modifications.php',
        'Tribe\\Events\\I18n' => __DIR__ . '/../..' . '/src/Tribe/I18n.php',
        'Tribe\\Events\\Integrations\\Beaver_Builder' => __DIR__ . '/../..' . '/src/Tribe/Integrations/Beaver_Builder.php',
        'Tribe\\Events\\Integrations\\Divi\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Integrations/Divi/Service_Provider.php',
        'Tribe\\Events\\Integrations\\Fusion\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Integrations/Fusion/Service_Provider.php',
        'Tribe\\Events\\Integrations\\Fusion\\Widget_Shortcode' => __DIR__ . '/../..' . '/src/Tribe/Integrations/Fusion/Widget_Shortcode.php',
        'Tribe\\Events\\Integrations\\Hello_Elementor\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Integrations/Hello_Elementor/Service_Provider.php',
        'Tribe\\Events\\Integrations\\Hello_Elementor\\Templates' => __DIR__ . '/../..' . '/src/Tribe/Integrations/Hello_Elementor/Templates.php',
        'Tribe\\Events\\Integrations\\Restrict_Content_Pro\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Integrations/Restrict_Content_Pro/Service_Provider.php',
        'Tribe\\Events\\Integrations\\WPML\\Views\\V2\\Filters' => __DIR__ . '/../..' . '/src/Tribe/Integrations/WPML/Views/V2/Filters.php',
        'Tribe\\Events\\Integrations\\WP_Rocket' => __DIR__ . '/../..' . '/src/Tribe/Integrations/WP_Rocket.php',
        'Tribe\\Events\\Models\\Post_Types\\Event' => __DIR__ . '/../..' . '/src/Tribe/Models/Post_Types/Event.php',
        'Tribe\\Events\\Models\\Post_Types\\Organizer' => __DIR__ . '/../..' . '/src/Tribe/Models/Post_Types/Organizer.php',
        'Tribe\\Events\\Models\\Post_Types\\Venue' => __DIR__ . '/../..' . '/src/Tribe/Models/Post_Types/Venue.php',
        'Tribe\\Events\\Service_Providers\\Context' => __DIR__ . '/../..' . '/src/Tribe/Service_Providers/Context.php',
        'Tribe\\Events\\Service_Providers\\First_Boot' => __DIR__ . '/../..' . '/src/Tribe/Service_Providers/First_Boot.php',
        'Tribe\\Events\\Taxonomy\\Event_Tag' => __DIR__ . '/../..' . '/src/Tribe/Taxonomy/Event_Tag.php',
        'Tribe\\Events\\Taxonomy\\Taxonomy_Provider' => __DIR__ . '/../..' . '/src/Tribe/Taxonomy/Taxonomy_Provider.php',
        'Tribe\\Events\\Views\\V2\\Assets' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Assets.php',
        'Tribe\\Events\\Views\\V2\\Customizer' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Configuration' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Configuration.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Hooks' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Hooks.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Notice' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Notice.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Section\\Events_Bar' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Section/Events_Bar.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Section\\Global_Elements' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Section/Global_Elements.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Section\\Month_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Section/Month_View.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Section\\Single_Event' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Section/Single_Event.php',
        'Tribe\\Events\\Views\\V2\\Customizer\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Customizer/Service_Provider.php',
        'Tribe\\Events\\Views\\V2\\Hooks' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Hooks.php',
        'Tribe\\Events\\Views\\V2\\Implementation_Error' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Implementation_Error.php',
        'Tribe\\Events\\Views\\V2\\Index' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Index.php',
        'Tribe\\Events\\Views\\V2\\Interfaces\\Repository_User_Interface' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Interfaces/Repository_User_Interface.php',
        'Tribe\\Events\\Views\\V2\\Interfaces\\View_Partial_Interface' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Interfaces/View_Partial_Interface.php',
        'Tribe\\Events\\Views\\V2\\Interfaces\\View_Url_Provider_Interface' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Interfaces/View_Url_Provider_Interface.php',
        'Tribe\\Events\\Views\\V2\\Kitchen_Sink' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Kitchen_Sink.php',
        'Tribe\\Events\\Views\\V2\\Manager' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Manager.php',
        'Tribe\\Events\\Views\\V2\\Messages' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Messages.php',
        'Tribe\\Events\\Views\\V2\\Query\\Event_Query_Controller' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Query/Event_Query_Controller.php',
        'Tribe\\Events\\Views\\V2\\Query\\Hide_From_Upcoming_Controller' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Query/Hide_From_Upcoming_Controller.php',
        'Tribe\\Events\\Views\\V2\\Repository\\Event_Period' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Repository/Event_Period.php',
        'Tribe\\Events\\Views\\V2\\Repository\\Event_Result' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Repository/Event_Result.php',
        'Tribe\\Events\\Views\\V2\\Repository\\Events_Result_Set' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Repository/Events_Result_Set.php',
        'Tribe\\Events\\Views\\V2\\Rest_Endpoint' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Rest_Endpoint.php',
        'Tribe\\Events\\Views\\V2\\Rewrite' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Rewrite.php',
        'Tribe\\Events\\Views\\V2\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Service_Provider.php',
        'Tribe\\Events\\Views\\V2\\Template' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template.php',
        'Tribe\\Events\\Views\\V2\\Template\\Event' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/Event.php',
        'Tribe\\Events\\Views\\V2\\Template\\Excerpt' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/Excerpt.php',
        'Tribe\\Events\\Views\\V2\\Template\\Featured_Title' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/Featured_Title.php',
        'Tribe\\Events\\Views\\V2\\Template\\JSON_LD' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/JSON_LD.php',
        'Tribe\\Events\\Views\\V2\\Template\\Page' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/Page.php',
        'Tribe\\Events\\Views\\V2\\Template\\Promo' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/Promo.php',
        'Tribe\\Events\\Views\\V2\\Template\\Settings\\Advanced_Display' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/Settings/Advanced_Display.php',
        'Tribe\\Events\\Views\\V2\\Template\\Title' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template/Title.php',
        'Tribe\\Events\\Views\\V2\\Template_Bootstrap' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Template_Bootstrap.php',
        'Tribe\\Events\\Views\\V2\\Theme_Compatibility' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Theme_Compatibility.php',
        'Tribe\\Events\\Views\\V2\\Url' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Url.php',
        'Tribe\\Events\\Views\\V2\\Utils\\Separators' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Utils/Separators.php',
        'Tribe\\Events\\Views\\V2\\Utils\\Stack' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Utils/Stack.php',
        'Tribe\\Events\\Views\\V2\\Utils\\View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Utils/View.php',
        'Tribe\\Events\\Views\\V2\\View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/View.php',
        'Tribe\\Events\\Views\\V2\\View_Interface' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/View_Interface.php',
        'Tribe\\Events\\Views\\V2\\View_Register' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/View_Register.php',
        'Tribe\\Events\\Views\\V2\\Views\\By_Day_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/By_Day_View.php',
        'Tribe\\Events\\Views\\V2\\Views\\Day_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Day_View.php',
        'Tribe\\Events\\Views\\V2\\Views\\Latest_Past_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Latest_Past_View.php',
        'Tribe\\Events\\Views\\V2\\Views\\List_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/List_View.php',
        'Tribe\\Events\\Views\\V2\\Views\\Month_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Month_View.php',
        'Tribe\\Events\\Views\\V2\\Views\\Reflector_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Reflector_View.php',
        'Tribe\\Events\\Views\\V2\\Views\\Traits\\Breakpoint_Behavior' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Traits/Breakpoint_Behavior.php',
        'Tribe\\Events\\Views\\V2\\Views\\Traits\\HTML_Cache' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Traits/HTML_Cache.php',
        'Tribe\\Events\\Views\\V2\\Views\\Traits\\Json_Ld_Data' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Traits/Json_Ld_Data.php',
        'Tribe\\Events\\Views\\V2\\Views\\Traits\\List_Behavior' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Traits/List_Behavior.php',
        'Tribe\\Events\\Views\\V2\\Views\\Traits\\With_Fast_Forward_Link' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Traits/With_Fast_Forward_Link.php',
        'Tribe\\Events\\Views\\V2\\Views\\Traits\\iCal_Data' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Traits/iCal_Data.php',
        'Tribe\\Events\\Views\\V2\\Views\\Widgets\\Widget_List_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Widgets/Widget_List_View.php',
        'Tribe\\Events\\Views\\V2\\Views\\Widgets\\Widget_View' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Views/Widgets/Widget_View.php',
        'Tribe\\Events\\Views\\V2\\Widgets\\Admin_Template' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Widgets/Admin_Template.php',
        'Tribe\\Events\\Views\\V2\\Widgets\\Assets' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Widgets/Assets.php',
        'Tribe\\Events\\Views\\V2\\Widgets\\Compatibility' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Widgets/Compatibility.php',
        'Tribe\\Events\\Views\\V2\\Widgets\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Widgets/Service_Provider.php',
        'Tribe\\Events\\Views\\V2\\Widgets\\Widget_Abstract' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Widgets/Widget_Abstract.php',
        'Tribe\\Events\\Views\\V2\\Widgets\\Widget_List' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Widgets/Widget_List.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\Google_Calendar' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/Google_Calendar.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\Link_Abstract' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/Link_Abstract.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\Link_Interface' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/Link_Interface.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\Outlook_365' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/Outlook_365.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\Outlook_Export' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/Outlook_Export.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\Outlook_Live' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/Outlook_Live.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\iCal' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/iCal.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Links\\iCalendar_Export' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Links/iCalendar_Export.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Request' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Request.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Single_Events' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Single_Events.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Template' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Template.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\Traits\\Outlook_Methods' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/Traits/Outlook_Methods.php',
        'Tribe\\Events\\Views\\V2\\iCalendar\\iCalendar_Handler' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/iCalendar/iCalendar_Handler.php',
        'Tribe__Events__Main_Deprecated' => __DIR__ . '/../..' . '/src/deprecated/Traits/Tribe__Events__Main_Deprecated.php',
        'Tribe__Events__Query_Deprecated' => __DIR__ . '/../..' . '/src/deprecated/Traits/Tribe__Events__Query_Deprecated.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcd0cd91306ca46f339db5445aa4762d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcd0cd91306ca46f339db5445aa4762d0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcd0cd91306ca46f339db5445aa4762d0::$classMap;

        }, null, ClassLoader::class);
    }
}

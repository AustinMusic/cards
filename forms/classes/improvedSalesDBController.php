<?php
class improvedSalesDBController{
    public $db;

	public function getAssessedValues($id){
		$sql_fields[] = ASSESSED_TABLE.".mappage";
		$sql_fields[] = ASSESSED_TABLE.".taxlot";
		$sql_fields[] = ASSESSED_TABLE.".parcelno";
		$sql_fields[] = ASSESSED_TABLE.".assessedglasf";
		$sql_fields[] = ASSESSED_TABLE.".marketland";
		$sql_fields[] = ASSESSED_TABLE.".marketimp";
		$sql_fields[] = ASSESSED_TABLE.".markettotal";
		$sql_fields[] = ASSESSED_TABLE.".measure50";
		$sql_fields[] = ASSESSED_TABLE.".annualtaxes";
		$sql_fields[] = ASSESSED_TABLE.".id";
		
		$tables_sql[] = ASSESSED_TABLE;
		
		 $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
		$search_sql[] = ASSESSED_TABLE.".FK_ReportID=:id";
		
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".ASSESSED_TABLE.".id ASC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    }
    
    public function getMfValues($id){
		$sql_fields[] = MFMATRIX_TABLE.".mfnounits";
		$sql_fields[] = MFMATRIX_TABLE.".mfsize";
		$sql_fields[] = MFMATRIX_TABLE.".mftotalsf";
		$sql_fields[] = MFMATRIX_TABLE.".mfrent";
		$sql_fields[] = MFMATRIX_TABLE.".mfrentsf";
		$sql_fields[] = MFMATRIX_TABLE.".mfnobr";
		$sql_fields[] = MFMATRIX_TABLE.".id";
		
		$tables_sql[] = MFMATRIX_TABLE;
		
		 $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
		$search_sql[] = MFMATRIX_TABLE.".FK_ReportID=:id";
		
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".MFMATRIX_TABLE.".id ASC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    }
    
    public function getLinks($id){
        $sql = "SELECT * FROM ".DOC_LINKS." WHERE ".DOC_LINKS.".FK_ReportID=:id" ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getTableRecord($id){

        $sql_fields[] = REPORT_TABLE.".id";
        
		$sql_fields[] = "if(".PROPERTY_TABLE.".thumbnail = '', 'no-photo-tn.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) as thumbnail";
        $sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) as photo1";
        $sql_fields[] = PROPERTY_TABLE.".property_name";
        $sql_fields[] = PROPERTY_TABLE.".lat";
        $sql_fields[] = PROPERTY_TABLE.".lng";
        $sql_fields[] = "CONCAT(".PROPERTY_TABLE.".streetnumber,' ',".PROPERTY_TABLE.".streetname) AS address";
        $sql_fields[] = PROPERTY_TABLE.".city";
        $sql_fields[] = PROPERTY_TABLE.".zoning_code";
        
        $sql_fields[] = SUBMARKET_TABLE.".submarket";
        
        $sql_fields[] = PROPERTYTYPE_TABLE.".propertytype";
        
        $sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
        
        $sql_fields[] = BUILDING_TABLE.".no_stories";
        $sql_fields[] = BUILDING_TABLE.".parking_ratio";
        $sql_fields[] = BUILDING_TABLE.".year_built_search AS year_built";
        $sql_fields[] = BUILDING_TABLE.".last_renovation";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
        $sql_fields[] = BUILDING_TABLE.".const_descr";
        $sql_fields[] = "CONCAT(".BUILDING_TABLE.".site_cover_primary,' %') AS site_cover_primary";

        $sql_fields[] = "DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y') AS record_date";
        $sql_fields[] = "IF(".SALES_TRANSACTIONS_TABLE.".sale_status=3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";
        $sql_fields[] = "IF(".BUILDING_TABLE.".occupancy_type=3,'',".WFDICTIONARY_M_TABLE.".definition) AS occupancy_type";
        $sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_nra, 2)) AS adj_price_sf_nra";
        $sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_unit, 2)) AS adj_price_unit";
        $sql_fields[] = "CONCAT(FORMAT(".SALES_TRANSACTIONS_TABLE.".cap_rate,2),' %') AS cap_rate";
        
        $sql_fields[] = "CONCAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_pct_office,' %') AS ind_pct_office";

        
        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' LEFT JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SUBMARKET_TABLE.' ON '.PROPERTY_TABLE.'.submarkid='.SUBMARKET_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' '.WFDICTIONARY_M_TABLE.' ON '.BUILDING_TABLE.'.occupancy_type='.WFDICTIONARY_M_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
         
        $search_sql[] = REPORT_TABLE.".id=:id";
        
        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getRecord($id){
        
        
        $sql_fields[] = REPORT_TABLE.".id";
        $sql_fields[] = REPORT_TABLE.".status";
        $sql_fields[] = REPORT_TABLE.".priority";
        $sql_fields[] = REPORT_TABLE.".AssignedTo";
        $sql_fields[] = REPORT_TABLE.".DueDate";
        $sql_fields[] = REPORT_TABLE.".reportname";
        $sql_fields[] = REPORT_TABLE.".template";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%M %e %Y %r') as DateCreated";
        $sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateModified,'%M %e %Y %r') as DateModified";
		$sql_fields[] = "IF(".REPORT_TABLE.".cloneorigin is NULL, 'Original File', CONCAT('Clone of ',".REPORT_TABLE.".cloneorigin, ' ID ', ".REPORT_TABLE.".cloneid)) as FileOrigin";
		$sql_fields[] = "IF(".REPORT_TABLE.".cloneorigin = 'Appraisal Report', CONCAT('appraisals.php?id=',".REPORT_TABLE.".cloneid), IF(".REPORT_TABLE.".cloneorigin = 'Improved Sales', CONCAT('improvedsales.php?id=',".REPORT_TABLE.".cloneid), IF(".REPORT_TABLE.".cloneorigin = 'Land Sales', CONCAT('landsales.php?id=',".REPORT_TABLE.".cloneid), CONCAT('leases.php?id=',".REPORT_TABLE.".cloneid)))) as clonelink";
        
        $sql_fields[] = PROPERTY_TABLE.".property_name";
        $sql_fields[] = PROPERTY_TABLE.".address";
        $sql_fields[] = PROPERTY_TABLE.".streetnumber";
        $sql_fields[] = PROPERTY_TABLE.".streetname";
        $sql_fields[] = PROPERTY_TABLE.".city";
        $sql_fields[] = PROPERTY_TABLE.".county";
        $sql_fields[] = PROPERTY_TABLE.".state";
        $sql_fields[] = PROPERTY_TABLE.".zip_code";
        $sql_fields[] = PROPERTY_TABLE.".lat";
        $sql_fields[] = PROPERTY_TABLE.".lng";
        $sql_fields[] = PROPERTY_TABLE.".propertytype";
        $sql_fields[] = PROPERTY_TABLE.".propertysubtype";
        $sql_fields[] = PROPERTY_TABLE.".msa";
        $sql_fields[] = PROPERTY_TABLE.".genmarket";
        $sql_fields[] = PROPERTY_TABLE.".submarkid";
        $sql_fields[] = PROPERTY_TABLE.".legal_desc";
        $sql_fields[] = PROPERTY_TABLE.".photo1";
        $sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) as image";
        $sql_fields[] = PROPERTY_TABLE.".platmap";
        $sql_fields[] = "if(".PROPERTY_TABLE.".platmap = '', 'no-photo.jpg', concat(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".platmap)) as platimage";
        $sql_fields[] = PROPERTY_TABLE.".thumbnail";
        $sql_fields[] = PROPERTY_TABLE.".gla_inputtype";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gla_inputsize,3) AS gla_inputsize";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".primary_acre,3) AS primary_acre";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".primary_sf,0) AS primary_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_acre,3) AS gross_land_acre";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) AS gross_land_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".unusable_sf,0) AS unusable_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".unusable_acre,3) AS unusable_acre";
        $sql_fields[] = PROPERTY_TABLE.".unusable_desc";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_sf,0) AS net_usable_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_acre,3) AS net_usable_acre";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".surplus_sf,0) AS surplus_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".excess_sf,0) AS excess_sf";
        $sql_fields[] = "FORMAT(".PROPERTY_TABLE.".excess_acre,3) AS excess_acre";
        $sql_fields[] = PROPERTY_TABLE.".net_usable_desc";
        $sql_fields[] = PROPERTY_TABLE.".excess_desc";
        $sql_fields[] = PROPERTY_TABLE.".emdomain";
        $sql_fields[] = PROPERTY_TABLE.".assessedyear";
        $sql_fields[] = PROPERTY_TABLE.".shape";
        $sql_fields[] = PROPERTY_TABLE.".topography";
        $sql_fields[] = PROPERTY_TABLE.".utilities";
        $sql_fields[] = PROPERTY_TABLE.".flood_plain";
        $sql_fields[] = PROPERTY_TABLE.".fppanel";
        $sql_fields[] = PROPERTY_TABLE.".orientation";
        $sql_fields[] = PROPERTY_TABLE.".site_access";
        $sql_fields[] = PROPERTY_TABLE.".exposure";
        $sql_fields[] = PROPERTY_TABLE.".easement";
        $sql_fields[] = PROPERTY_TABLE.".easement_desc";
        $sql_fields[] = PROPERTY_TABLE.".other_land_comments";
        $sql_fields[] = PROPERTY_TABLE.".zoning_juris";
        $sql_fields[] = PROPERTY_TABLE.".zoning_code";
        $sql_fields[] = PROPERTY_TABLE.".zoning_desc";
        $sql_fields[] = PROPERTY_TABLE.".traffic_count";
        $sql_fields[] = PROPERTY_TABLE.".traffic_date";
        $sql_fields[] = PROPERTY_TABLE.".inter_street";
        $sql_fields[] = PROPERTY_TABLE.".floor_area_ratio";

        
        $sql_fields[] = BUILDING_TABLE.".no_building";
        $sql_fields[] = BUILDING_TABLE.".no_stories";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_1_gba,0) AS floor_1_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_2_gba,0) AS floor_2_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".total_basement_gba,0) AS total_basement_gba";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".basement_pct_gba,1),' %') AS basement_pct_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
        $sql_fields[] = BUILDING_TABLE.".gba_source";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_1_nra,0) AS floor_1_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".floor_2_nra,0) AS floor_2_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".total_basement_nra,0) AS total_basement_nra";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".basement_pct_nra,1),' %') AS basement_pct_nra";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_nra,0) AS overall_nra";
        $sql_fields[] = BUILDING_TABLE.".nra_source";
        $sql_fields[] = BUILDING_TABLE.".basement_type";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".storage_basement_sf,0) AS storage_basement_sf";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".ancillary_area_sf,0) AS ancillary_area_sf";
        $sql_fields[] = BUILDING_TABLE.".ancillary_area_desc";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".land_build_ratio_overall,1) AS land_build_ratio_overall";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".land_build_ratio_primary,1) AS land_build_ratio_primary";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".land_build_usable,1) AS land_build_usable";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_overall,1),' %') AS site_cover_overall";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_primary,1),' %') AS site_cover_primary";
        $sql_fields[] = BUILDING_TABLE.".year_built_search";
        $sql_fields[] = BUILDING_TABLE.".last_renovation";
        $sql_fields[] = BUILDING_TABLE.".year_built";
        $sql_fields[] = BUILDING_TABLE.".occupancy_type";
        $sql_fields[] = BUILDING_TABLE.".building_quality";
        $sql_fields[] = BUILDING_TABLE.".int_condition";
        $sql_fields[] = BUILDING_TABLE.".ext_condition";
        $sql_fields[] = BUILDING_TABLE.".building_class";
        $sql_fields[] = BUILDING_TABLE.".const_class";
        $sql_fields[] = BUILDING_TABLE.".const_descr";
        $sql_fields[] = BUILDING_TABLE.".other_const_features";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_stalls,0) AS parking_stalls";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_ratio_gba,2) AS parking_ratio_gba";
        $sql_fields[] = "FORMAT(".BUILDING_TABLE.".parking_ratio_nra,2) AS parking_ratio_nra";
        $sql_fields[] = BUILDING_TABLE.".parking_type";
        $sql_fields[] = BUILDING_TABLE.".parking_ratio";
        $sql_fields[] = BUILDING_TABLE.".building_comments";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".eff_ratio_pct_nra,1),' %') AS eff_ratio_pct_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".replace_cost,2)) AS replace_cost";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".est_rcn,0)) AS est_rcn";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".less_alloc_imp_price,1)) AS less_alloc_imp_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".depreciation_all_sources,0)) AS depreciation_all_sources";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".implied_total_pct_deprec,1),' %') AS implied_total_pct_deprec";
        $sql_fields[] = BUILDING_TABLE.".eff_age_years";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".physical_depreciation,1),' %') AS physical_depreciation";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".inplied_func_obsol,1),' %') AS inplied_func_obsol";
        $sql_fields[] = BUILDING_TABLE.".oe_income_actual_proforma";
        $sql_fields[] = BUILDING_TABLE.".oe_income_source";
        $sql_fields[] = BUILDING_TABLE.".oe_only_noi";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_pgr,0)) AS oe_pgr";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_cam_income,0)) AS oe_cam_income";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_misc_income,0)) AS oe_misc_income";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_pgi,0)) AS oe_pgi";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".oe_vacany_pct,5),' %') AS oe_vacany_pct";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_vacancy_credit_loss,0)) AS oe_vacancy_credit_loss ";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_other_income,0)) AS oe_other_income";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_egi,0)) AS oe_egi";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_expences,0)) AS oe_expences";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_total_other_income,0)) AS oe_total_other_income";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_pgr_sf_nra,2)) AS oe_pgr_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_cam_sf_nra,2)) AS oe_cam_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".pgi_sf_nra,2)) AS pgi_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".vacancy_sf_nra,2)) AS vacancy_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".egi_sf_nra,2)) AS egi_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".expence_sf_nra,2)) AS expence_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_noi_sf_nra,2)) AS oe_noi_sf_nra";
        $sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".oe_expence_ratio,2),' %') AS oe_expence_ratio";
        $sql_fields[] = BUILDING_TABLE.".oe_reserves";
        $sql_fields[] = BUILDING_TABLE.".oe_management_expence";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".BUILDING_TABLE.".oe_total_noi,0)) AS oe_total_noi";
        
        
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".property_appraised";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".mc_job";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".appraiser_name";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".grantor";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".grantee";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".sale_price,0)) AS sale_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_land_value,0)) AS alloc_land_value";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".prop_rights_conv";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".interest_conv";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".conv_doc_type";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".conv_doc_rec_no";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".record_date";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".sale_status";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".market_time";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".current_use";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".proposed_use_change";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".proposed_use_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".cash_equiv_price,0)) AS cash_equiv_price";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".type_finance";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".list_price_avail";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".list_price,0)) AS list_price";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".list_price_change,1)) AS list_price_change";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".datasource";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".inspect_date";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm_date";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".inspect_type";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".mc_file_no";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm_1_source";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".relationship_1";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm_2_souce";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".relationship_2";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".market_flyer";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".fin_term_adj,0)) AS fin_term_adj";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".fin_term_adj_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".cond_sale_adj,0)) AS cond_sale_adj";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".cond_sale_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".broker_cost,0)) AS broker_cost";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".broker_cost_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".eff_sale_price_stab,0)) AS eff_sale_price_stab";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".adj_price_comment";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".inc_ffe";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".value_ffe,0)) AS value_ffe";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".desc_ffe";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".sale_comments";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".conf_comments";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".defer_maint_cost,0)) AS defer_maint_cost";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".defer_main_cost_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".eff_sale_price_actual,0)) AS eff_sale_price_actual";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".stabil_cost,0)) AS stabil_cost";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".stabil_cost_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".add_ti_cost,0)) AS add_ti_cost";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".add_ti_cost_desc";
        $sql_fields[] = "FORMAT(".SALES_TRANSACTIONS_TABLE.".excess_surpluss_sf,0) AS excess_surpluss_sf";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".excess_surplus_value_desc";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".buyer_status";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".alloc_land_value_source";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".underlying_land_value_primary,2)) AS underlying_land_value_primary";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_imp_value,0)) AS alloc_imp_value";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".excess_surplus_value,0)) AS excess_surplus_value";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".total_value_ffe,0)) AS total_value_ffe";
        $sql_fields[] = "CONCAT(FORMAT(".SALES_TRANSACTIONS_TABLE.".cap_rate,2),' %') AS cap_rate";
        $sql_fields[] = "FORMAT(".SALES_TRANSACTIONS_TABLE.".egim,2) AS egim";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba,2)) AS adj_price_sf_gba";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_nra,2)) AS adj_price_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_imp_value_sf_gba,2)) AS alloc_imp_value_sf_gba";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_imp_value_sf_nra,2)) AS alloc_imp_value_sf_nra";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_tunnel,0)) AS adj_price_tunnel";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_unit,0)) AS adj_price_unit";
        $sql_fields[] = "FORMAT(".SALES_TRANSACTIONS_TABLE.".fuel_sales_mult,2) AS fuel_sales_mult";
        $sql_fields[] = "FORMAT(".SALES_TRANSACTIONS_TABLE.".store_sales_mult,2) AS store_sales_mult";
        $sql_fields[] = "FORMAT(".SALES_TRANSACTIONS_TABLE.".pgim,2) AS pgim";
		$sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm1";
        $sql_fields[] = SALES_TRANSACTIONS_TABLE.".confirm2";
        
        
        
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_clear_height";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_ext_office_1,0) AS ind_ext_office_1";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_ext_office_2,0) AS ind_ext_office_2";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_fire";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_hvac";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_int_office_1,0) AS ind_int_office_1";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_int_office_2,0) AS ind_int_office_2";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_mezz_desc";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_no_rail";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_pct_office,1),' %') AS ind_pct_office";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_rail";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_storage_mess";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_storage_mezz_sf,0) AS ind_storage_mezz_sf";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_total_office,0) AS ind_total_office";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_truck_dock";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ind_truck_grade";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_elevator_service";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_fire_sprinkler";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".off_type_hvac";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_alcohol";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_drive_thru";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_no_seats";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".rest_playground";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_achor_space_inc";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_anchor_pct,1),' %') AS shop_anchor_pct";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_anchor_sf,0) AS shop_anchor_sf";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_anchor_tenant";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_inline_pct,1),' %') AS shop_inline_pct";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_inline_sf,0) AS shop_inline_sf";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".shop_other_tenant";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_total_gba,0) AS shop_total_gba";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".shop_total_nra,0) AS shop_total_nra";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_alarm";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_boat";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_code_access";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_heat";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_on_site";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_residence";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_residence_desc";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".ss_security";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_avg_month_gallon,0) AS store_avg_month_gallon";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_canopy";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_canopy_desc";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_chain_affil";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_co_chain_affil";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_fuel_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_month_car_wash_sales,0)) AS store_month_car_wash_sales";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_month_mini_sales,0)) AS store_month_mini_sales";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_month_store_sales,0)) AS store_month_store_sales";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".store_no_fuel";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".store_total_month_sales,0)) AS store_total_month_sales";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".veh_level";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_service_sf,0) AS veh_service_sf";
        $sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_showroom_pct,1),' %') AS veh_showroom_pct";
        $sql_fields[] = "FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".veh_showroom_sf,0) AS veh_showroom_sf";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".veh_tunnel";		
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".sfbedroom";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".sffullbath";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".sfhalfbath";
        $sql_fields[] = PROPERTYTYPE_DETAILS_TABLE.".addstructures";
		
        
        
        $sql_fields[] = IMPROVED_UNIT.".wash_dry";
        $sql_fields[] = IMPROVED_UNIT.".exercise";
        $sql_fields[] = IMPROVED_UNIT.".spa";
        $sql_fields[] = IMPROVED_UNIT.".other_amenities";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".no_single_wide,0) AS no_single_wide";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".no_triple_wide,0) AS no_triple_wide";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".no_double_wide,0) AS no_double_wide";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".no_rv_space,0) AS no_rv_space";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".total_space,0) AS total_space";
        $sql_fields[] = IMPROVED_UNIT.".other_building_desc";
        $sql_fields[] = IMPROVED_UNIT.".park_cond";
        $sql_fields[] = IMPROVED_UNIT.".park_quality";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".space_acre,1) AS space_acre";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".price_space,1)) AS price_space";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".noi_space,1)) AS noi_space";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".expense_space,1)) AS expense_space";
        $sql_fields[] = IMPROVED_UNIT.".no_other_building";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".pgi_space,1)) AS pgi_space";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".vacancy_space,1)) AS vacancy_space";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".egi_space,1)) AS egi_space";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".total_no_units,0) AS total_no_units";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".density,2) AS density";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".avg_unit_size,0) AS avg_unit_size";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".total_bedroom,0) AS total_bedroom";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".bedroom_ratio,2) AS bedroom_ratio";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".parking_ratio_unit,2) AS parking_ratio_unit";
        $sql_fields[] = IMPROVED_UNIT.".subsidized_project";
        $sql_fields[] = IMPROVED_UNIT.".subsidized_project_desc";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".avg_month_rent_unit,0)) AS avg_month_rent_unit";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".avg_month_rent_sf,2)) AS avg_month_rent_sf";
        $sql_fields[] = IMPROVED_UNIT.".annual_turnover_pct";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".total_rooms,0) AS total_rooms";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".pgi_unit,0)) AS pgi_unit";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".expense_unit,0)) AS expense_unit";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".vacancy_unit,0)) AS vacancy_unit";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".noi_unit,0)) AS noi_unit";
        $sql_fields[] = "CONCAT('$ ',FORMAT(".IMPROVED_UNIT.".egi_unit,0)) AS egi_unit";
        $sql_fields[] = "FORMAT(".IMPROVED_UNIT.".total_storage_units,0) AS total_storage_units";
        
        $sql_fields[] = TEMPLATES_TABLE.".templatepath";
        $sql_fields[] = "CONCAT(".WFUSERS_TABLE.".firstname,' ',".WFUSERS_TABLE.".lastname) as CreatedBy";
        $sql_fields[] = "CONCAT(".WFUSERS_M_TABLE.".firstname,' ',".WFUSERS_M_TABLE.".lastname) as ModifiedBy";
        
        
            
        $tables_sql[] = REPORT_TABLE;
        $tables_sql[] = ' JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.IMPROVED_UNIT.' ON '.REPORT_TABLE.'.id='.IMPROVED_UNIT.'.FK_ReportID';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' ON '.REPORT_TABLE.'.CreatedBy='.WFUSERS_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' '.WFUSERS_M_TABLE.' ON '.REPORT_TABLE.'.ModifiedBy='.WFUSERS_M_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
        
        $search_sql[] = REPORT_TABLE.".id=:id";

        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    
    public function imrovedsaleOperation($improvedsales,$user_id){
        $actionMode = "INSERT";
        if(isset($_GET['id'])){
            $actionMode = "UPDATE";
        }
        
        try{
            $this->db->beginTransaction();
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".REPORT_TABLE." (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, template, CreatedBy, ModifiedBy) VALUES  (:FK_ReportTypeID, :status, :priority, :AssignedTo, :DueDate, :OwnerID, :reportname, :template, :CreatedBy, :ModifiedBy)");
        
                $stmt->bindValue(':FK_ReportTypeID',2,PDO::PARAM_INT);
                $stmt->bindValue(':OwnerID',$user_id,PDO::PARAM_INT);
                $stmt->bindValue(':CreatedBy',$user_id,PDO::PARAM_INT);
                $stmt->bindValue(':ModifiedBy',$user_id,PDO::PARAM_INT);
            }else{
                $stmt = $this->db->prepare("UPDATE ".REPORT_TABLE." SET status=:status, DateModified=:DateModified, priority=:priority, AssignedTo=:AssignedTo, DueDate=:DueDate, reportname=:reportname, template=:template, ModifiedBy=:ModifiedBy WHERE ".REPORT_TABLE.".id=:reportID");

                $stmt->bindValue(':DateModified',$improvedsales->getDateModified(),PDO::PARAM_STR);
                $stmt->bindValue(':reportID',$improvedsales->getId(),PDO::PARAM_INT);
                $stmt->bindValue(':ModifiedBy',$user_id,PDO::PARAM_INT);
            }

            /*Common bindings*/
            $stmt->bindValue(':status',$improvedsales->getStatus(),PDO::PARAM_INT);
            $stmt->bindValue(':priority',$improvedsales->getPriority(),PDO::PARAM_INT);
            $stmt->bindValue(':AssignedTo',$improvedsales->getAssignedTo(),PDO::PARAM_INT);
            $stmt->bindValue(':DueDate',$improvedsales->getDueDate(),PDO::PARAM_STR);
            $stmt->bindValue(':reportname',$improvedsales->getReportname(),PDO::PARAM_STR);
            $stmt->bindValue(':template',$improvedsales->getTemplate(),PDO::PARAM_INT);
        
            $result = $stmt->execute();
            if (!$result) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
        
            if($actionMode=="INSERT"){
                $improvedsales->setId($this->db->lastInsertId());
            }

            $directory = "../comp_images/".$improvedsales->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }
            $mediaUtilities = new rbe_mediaUtilities();
            if(!file_exists($_FILES['photo1']['tmp_name']) || !is_uploaded_file($_FILES['photo1']['tmp_name'])) {
                $final_file = $_POST['photo1path'];
                $final_file_thumb = $_POST['thumbpath'];
            } else {
                $file = explode(".", $_FILES["photo1"]["name"]);
                $file_loc = $_FILES['photo1']['tmp_name'];
                $file_size = $_FILES['photo1']['size'];
                $file_type = $_FILES['photo1']['type'];
                $folder = "../comp_images/" . $improvedsales->getId() . "/";
                $new_file_name = round(microtime(true)) . '.' . end($file);
                $final_file=str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$final_file);
                $mediaUtilities->imageTransformations($final_file,$folder,400,400,100,"","","resize",true);
                $final_file_thumb = explode(".",$final_file);
                $extension = $final_file_thumb[count($final_file_thumb)-1];
                array_splice($final_file_thumb,count($final_file_thumb)-1);
                $final_file_thumb = implode(".",$final_file_thumb);
                $final_file_thumb = $final_file_thumb."-tn".".".$extension;
                $mediaUtilities->imageTransformations($final_file,$folder,40,40,100,"-tn","","resize",true);
            }
            $improvedsales->setPhoto1($final_file);
            $improvedsales->setThumbnail($final_file_thumb);
            
            $mediaUtilities = new rbe_mediaUtilities();
            if(!file_exists($_FILES['platmap']['tmp_name']) || !is_uploaded_file($_FILES['platmap']['tmp_name'])) {
                $platmap = $_POST['platpath'];
            } else {
                $file = explode(".", $_FILES["platmap"]["name"]);
                $file_loc = $_FILES['platmap']['tmp_name'];
                $file_size = $_FILES['platmap']['size'];
                $file_type = $_FILES['platmap']['type'];
                $folder = "../comp_images/" . $improvedsales->getId() . "/";
                $new_file_name = round(microtime(true)) . rand(10,99).'.' . end($file);
                $platmap = str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$platmap);
                $mediaUtilities->imageTransformations($platmap,$folder,400,400,100,"","","resize",true);
             }
            $improvedsales->setPlatmap($platmap);
        
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT ".PROPERTY_TABLE." (FK_ReportID, photo1, thumbnail, platmap, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, primary_sf, primary_acre, unusable_sf, unusable_acre, unusable_desc, surplus_sf, surplus_acre, surplus_desc, excess_sf, excess_acre, excess_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, site_access, orientation, exposure, utilities, flood_plain, fppanel, easement, easement_desc, other_land_comments, zoning_code, zoning_juris, zoning_desc, traffic_count, inter_street, traffic_date, floor_area_ratio, emdomain, assessedyear, rmvland, rmvimp, rmvtotal, taxes) VALUES (:FK_ReportID, :photo1, :thumbnail, :platmap, :property_name, :address, :streetnumber, :streetname, :city, :county, :state, :zip_code, :lat, :lng, :propertytype, :propertysubtype, :msa, :genmarket, :submarkid, :legal_desc, :gla_inputtype, :gla_inputsize, :gross_land_sf, :gross_land_acre, :primary_sf, :primary_acre, :unusable_sf, :unusable_acre, :unusable_desc, :surplus_sf, :surplus_acre, :surplus_desc, :excess_sf, :excess_acre, :excess_desc, :net_usable_sf, :net_usable_acre, :net_usable_desc, :shape, :topography, :site_access, :orientation, :exposure, :utilities, :flood_plain, :fppanel, :easement, :easement_desc, :other_land_comments, :zoning_code, :zoning_juris, :zoning_desc, :traffic_count, :inter_street, :traffic_date, :floor_area_ratio, :emdomain, :assessedyear, :rmvland, :rmvimp, :rmvtotal, :taxes)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".PROPERTY_TABLE." SET photo1=:photo1, thumbnail=:thumbnail, platmap=:platmap, property_name=:property_name, address=:address, streetnumber=:streetnumber, streetname=:streetname, city=:city, county=:county, state=:state, zip_code=:zip_code, lat=:lat, lng=:lng, propertytype=:propertytype, propertysubtype=:propertysubtype, msa=:msa, genmarket=:genmarket, submarkid=:submarkid, legal_desc=:legal_desc, gla_inputtype=:gla_inputtype, gla_inputsize=:gla_inputsize, gross_land_sf=:gross_land_sf, gross_land_acre=:gross_land_acre, primary_sf=:primary_sf, primary_acre=:primary_acre, unusable_sf=:unusable_sf, unusable_acre=:unusable_acre, unusable_desc=:unusable_desc, surplus_sf=:surplus_sf, surplus_acre=:surplus_acre, surplus_desc=:surplus_desc, excess_sf=:excess_sf, excess_acre=:excess_acre, excess_desc=:excess_desc, net_usable_sf=:net_usable_sf, net_usable_acre=:net_usable_acre, net_usable_desc=:net_usable_desc, shape=:shape, topography=:topography, site_access=:site_access, orientation=:orientation, exposure=:exposure, utilities=:utilities, flood_plain=:flood_plain, fppanel=:fppanel, easement=:easement, easement_desc=:easement_desc, other_land_comments=:other_land_comments, zoning_code=:zoning_code, zoning_juris=:zoning_juris, zoning_desc=:zoning_desc, traffic_count=:traffic_count, inter_street=:inter_street, traffic_date=:traffic_date, floor_area_ratio=:floor_area_ratio, emdomain=:emdomain, assessedyear=:assessedyear, rmvland=:rmvland, rmvimp=:rmvimp, rmvtotal=:rmvtotal, taxes=:taxes WHERE ".PROPERTY_TABLE.".FK_ReportID=:FK_ReportID");
            }

            $stmt->bindValue(':photo1',$improvedsales->getPhoto1(),PDO::PARAM_STR);
            $stmt->bindValue(':thumbnail',$improvedsales->getThumbnail(),PDO::PARAM_STR);
            $stmt->bindValue(':platmap',$improvedsales->getPlatmap(),PDO::PARAM_STR);
            $stmt->bindValue(':property_name',$improvedsales->getProperty_name(),PDO::PARAM_STR);
            $stmt->bindValue(':address',$improvedsales->getAddress(),PDO::PARAM_STR);
            $stmt->bindValue(':streetnumber',$improvedsales->getStreetnumber(),PDO::PARAM_STR);
            $stmt->bindValue(':streetname',$improvedsales->getStreetname(),PDO::PARAM_STR);
            $stmt->bindValue(':city',$improvedsales->getCity(),PDO::PARAM_STR);
            $stmt->bindValue(':county',$improvedsales->getCounty(),PDO::PARAM_STR);
            $stmt->bindValue(':state',$improvedsales->getState(),PDO::PARAM_STR);
            $stmt->bindValue(':zip_code',$improvedsales->getZip_code(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$improvedsales->getLat(),PDO::PARAM_STR);
            $stmt->bindValue(':lng',$improvedsales->getLng(),PDO::PARAM_STR);
            $stmt->bindValue(':propertytype',$improvedsales->getPropertytype(),PDO::PARAM_INT);
            $stmt->bindValue(':propertysubtype',$improvedsales->getPropertysubtype(),PDO::PARAM_STR);
            $stmt->bindValue(':msa',$improvedsales->getMsa(),PDO::PARAM_STR);
            $stmt->bindValue(':genmarket',$improvedsales->getGenmarket(),PDO::PARAM_INT);
            $stmt->bindValue(':submarkid',$improvedsales->getSubmarkid(),PDO::PARAM_STR);
            $stmt->bindValue(':legal_desc',$improvedsales->getLegal_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':gla_inputtype',$improvedsales->getGla_inputtype(),PDO::PARAM_INT);
            $stmt->bindValue(':gla_inputsize',$improvedsales->getGla_inputsize(),PDO::PARAM_STR);
            $stmt->bindValue(':gross_land_sf',$improvedsales->getGross_land_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':gross_land_acre',$improvedsales->getGross_land_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':primary_sf',$improvedsales->getPrimary_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':primary_acre',$improvedsales->getPrimary_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':unusable_sf',$improvedsales->getUnusable_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':unusable_acre',$improvedsales->getUnusable_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':unusable_desc',$improvedsales->getUnusable_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':surplus_sf',$improvedsales->getSurplus_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':surplus_acre',$improvedsales->getSurplus_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':surplus_desc',$improvedsales->getSurplus_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':excess_sf',$improvedsales->getExcess_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':excess_acre',$improvedsales->getExcess_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':excess_desc',$improvedsales->getExcess_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':net_usable_sf',$improvedsales->getNet_usable_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':net_usable_acre',$improvedsales->getNet_usable_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':net_usable_desc',$improvedsales->getNet_usable_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':shape',$improvedsales->getShape(),PDO::PARAM_INT);
            $stmt->bindValue(':topography',$improvedsales->getTopography(),PDO::PARAM_INT);
            $stmt->bindValue(':site_access',$improvedsales->getSite_access(),PDO::PARAM_INT);
            $stmt->bindValue(':orientation',$improvedsales->getOrientation(),PDO::PARAM_INT);
            $stmt->bindValue(':exposure',$improvedsales->getExposure(),PDO::PARAM_INT);
            $stmt->bindValue(':utilities',$improvedsales->getUtilities(),PDO::PARAM_STR);
            $stmt->bindValue(':flood_plain',$improvedsales->getFlood_plain(),PDO::PARAM_INT);
            $stmt->bindValue(':fppanel',$improvedsales->getFppanel(),PDO::PARAM_STR);
            $stmt->bindValue(':easement',$improvedsales->getEasement(),PDO::PARAM_INT);
            $stmt->bindValue(':easement_desc',$improvedsales->getEasement_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':other_land_comments',$improvedsales->getOther_land_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_code',$improvedsales->getZoning_code(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_juris',$improvedsales->getZoning_juris(),PDO::PARAM_STR);
            $stmt->bindValue(':zoning_desc',$improvedsales->getZoning_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':traffic_count',$improvedsales->getTraffic_count(),PDO::PARAM_STR);
            $stmt->bindValue(':inter_street',$improvedsales->getInter_street(),PDO::PARAM_STR);
            $stmt->bindValue(':traffic_date',$improvedsales->getTraffic_date(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_area_ratio',$improvedsales->getFloor_area_ratio(),PDO::PARAM_INT);
            $stmt->bindValue(':emdomain',$improvedsales->getEmdomain(),PDO::PARAM_INT);
            $stmt->bindValue(':assessedyear',$improvedsales->getAssessedyear(),PDO::PARAM_STR);
            $stmt->bindValue(':rmvland',$improvedsales->getRmvland(),PDO::PARAM_INT);
            $stmt->bindValue(':rmvimp',$improvedsales->getRmvimp(),PDO::PARAM_INT);
            $stmt->bindValue(':rmvtotal',$improvedsales->getRmvtotal(),PDO::PARAM_INT);
            $stmt->bindValue(':taxes',$improvedsales->getTaxes(),PDO::PARAM_STR); 
            $stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);
        
            $result = $stmt->execute();
            if (!$result) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".BUILDING_TABLE." (FK_ReportID, no_building, no_stories, floor_1_gba, floor_2_gba, total_basement_gba, basement_pct_gba, overall_gba, gba_source, floor_1_nra, floor_2_nra, total_basement_nra, basement_pct_nra, overall_nra, nra_source, basement_type, storage_basement_sf, ancillary_area_sf, ancillary_area_desc, land_build_ratio_overall, land_build_ratio_primary, land_build_usable, eff_ratio_pct_nra, site_cover_overall, site_cover_primary, building_comments, year_built_search, last_renovation, year_built, occupancy_type, building_quality, int_condition, ext_condition, const_class, building_class, const_descr, other_const_features, parking_stalls, parking_type, parking_ratio_nra, parking_ratio, parking_ratio_gba, oe_income_actual_proforma, oe_income_source, oe_only_noi, oe_pgr, oe_cam_income, oe_misc_income, oe_pgi, oe_vacany_pct, oe_vacancy_credit_loss, oe_other_income, oe_egi, oe_expences, oe_total_other_income, oe_total_noi, oe_pgr_sf_nra, oe_cam_sf_nra, pgi_sf_nra, vacancy_sf_nra, egi_sf_nra, expence_sf_nra, oe_noi_sf_nra, oe_expence_ratio, oe_reserves, oe_management_expence, replace_cost, eff_age_years, est_rcn, less_alloc_imp_price, depreciation_all_sources, implied_total_pct_deprec, physical_depreciation, inplied_func_obsol) VALUES (:FK_ReportID, :no_building, :no_stories, :floor_1_gba, :floor_2_gba, :total_basement_gba, :basement_pct_gba, :overall_gba, :gba_source, :floor_1_nra, :floor_2_nra, :total_basement_nra, :basement_pct_nra, :overall_nra, :nra_source, :basement_type, :storage_basement_sf, :ancillary_area_sf, :ancillary_area_desc, :land_build_ratio_overall, :land_build_ratio_primary, :land_build_usable, :eff_ratio_pct_nra, :site_cover_overall, :site_cover_primary, :building_comments, :year_built_search, :last_renovation, :year_built, :occupancy_type, :building_quality, :int_condition, :ext_condition, :const_class, :building_class, :const_descr, :other_const_features, :parking_stalls, :parking_type, :parking_ratio_nra, :parking_ratio, :parking_ratio_gba, :oe_income_actual_proforma, :oe_income_source, :oe_only_noi, :oe_pgr, :oe_cam_income, :oe_misc_income, :oe_pgi, :oe_vacany_pct, :oe_vacancy_credit_loss, :oe_other_income, :oe_egi, :oe_expences, :oe_total_other_income, :oe_total_noi, :oe_pgr_sf_nra, :oe_cam_sf_nra, :pgi_sf_nra, :vacancy_sf_nra, :egi_sf_nra, :expence_sf_nra, :oe_noi_sf_nra, :oe_expence_ratio, :oe_reserves, :oe_management_expence, :replace_cost, :eff_age_years, :est_rcn, :less_alloc_imp_price, :depreciation_all_sources, :implied_total_pct_deprec, :physical_depreciation, :inplied_func_obsol)");
                
            }else{
                $stmt = $this->db->prepare("UPDATE ".BUILDING_TABLE." SET no_building=:no_building, no_stories=:no_stories, floor_1_gba=:floor_1_gba, floor_2_gba=:floor_2_gba, total_basement_gba=:total_basement_gba, basement_pct_gba=:basement_pct_gba, overall_gba=:overall_gba, gba_source=:gba_source, floor_1_nra=:floor_1_nra, floor_2_nra=:floor_2_nra, total_basement_nra=:total_basement_nra, basement_pct_nra=:basement_pct_nra, overall_nra=:overall_nra, nra_source=:nra_source, basement_type=:basement_type, storage_basement_sf=:storage_basement_sf, ancillary_area_sf=:ancillary_area_sf, ancillary_area_desc=:ancillary_area_desc, land_build_ratio_overall=:land_build_ratio_overall, land_build_ratio_primary=:land_build_ratio_primary, land_build_usable=:land_build_usable, eff_ratio_pct_nra=:eff_ratio_pct_nra, site_cover_overall=:site_cover_overall, site_cover_primary=:site_cover_primary, building_comments=:building_comments, year_built_search=:year_built_search, last_renovation=:last_renovation, year_built=:year_built, occupancy_type=:occupancy_type, building_quality=:building_quality, int_condition=:int_condition, ext_condition=:ext_condition, const_class=:const_class, building_class=:building_class, const_descr=:const_descr, other_const_features=:other_const_features, parking_stalls=:parking_stalls, parking_type=:parking_type, parking_ratio_nra=:parking_ratio_nra, parking_ratio=:parking_ratio, parking_ratio_gba=:parking_ratio_gba, oe_income_actual_proforma=:oe_income_actual_proforma, oe_income_source=:oe_income_source, oe_only_noi=:oe_only_noi, oe_pgr=:oe_pgr, oe_cam_income=:oe_cam_income, oe_misc_income=:oe_misc_income, oe_pgi=:oe_pgi, oe_vacany_pct=:oe_vacany_pct, oe_vacancy_credit_loss=:oe_vacancy_credit_loss, oe_other_income=:oe_other_income, oe_egi=:oe_egi, oe_expences=:oe_expences, oe_total_other_income=:oe_total_other_income, oe_total_noi=:oe_total_noi, oe_pgr_sf_nra=:oe_pgr_sf_nra, oe_cam_sf_nra=:oe_cam_sf_nra, pgi_sf_nra=:pgi_sf_nra, vacancy_sf_nra=:vacancy_sf_nra, egi_sf_nra=:egi_sf_nra, expence_sf_nra=:expence_sf_nra, oe_noi_sf_nra=:oe_noi_sf_nra, oe_expence_ratio=:oe_expence_ratio, oe_reserves=:oe_reserves, oe_management_expence=:oe_management_expence, replace_cost=:replace_cost, eff_age_years=:eff_age_years, est_rcn=:est_rcn, less_alloc_imp_price=:less_alloc_imp_price, depreciation_all_sources=:depreciation_all_sources, implied_total_pct_deprec=:implied_total_pct_deprec, physical_depreciation=:physical_depreciation, inplied_func_obsol=:inplied_func_obsol WHERE ".BUILDING_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':no_building',$improvedsales->getNo_building(),PDO::PARAM_INT);
            $stmt->bindValue(':no_stories',$improvedsales->getNo_stories(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_1_gba',$improvedsales->getFloor_1_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':floor_2_gba',$improvedsales->getFloor_2_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':total_basement_gba',$improvedsales->getTotal_basement_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':basement_pct_gba',$improvedsales->getBasement_pct_gba(),PDO::PARAM_STR);
            $stmt->bindValue(':overall_gba',$improvedsales->getOverall_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':gba_source',$improvedsales->getGba_source(),PDO::PARAM_STR);
            $stmt->bindValue(':floor_1_nra',$improvedsales->getFloor_1_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':floor_2_nra',$improvedsales->getFloor_2_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':total_basement_nra',$improvedsales->getTotal_basement_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':basement_pct_nra',$improvedsales->getBasement_pct_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':overall_nra',$improvedsales->getOverall_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':nra_source',$improvedsales->getNra_source(),PDO::PARAM_STR);
            $stmt->bindValue(':basement_type',$improvedsales->getBasement_type(),PDO::PARAM_STR);
            $stmt->bindValue(':storage_basement_sf',$improvedsales->getStorage_basement_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':ancillary_area_sf',$improvedsales->getAncillary_area_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':ancillary_area_desc',$improvedsales->getAncillary_area_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':land_build_ratio_overall',$improvedsales->getLand_build_ratio_overall(),PDO::PARAM_STR);
            $stmt->bindValue(':land_build_ratio_primary',$improvedsales->getLand_build_ratio_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':land_build_usable',$improvedsales->getLand_build_usable(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_ratio_pct_nra',$improvedsales->getEff_ratio_pct_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':site_cover_overall',$improvedsales->getSite_cover_overall(),PDO::PARAM_STR);
            $stmt->bindValue(':site_cover_primary',$improvedsales->getSite_cover_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':building_comments',$improvedsales->getBuilding_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':year_built_search',$improvedsales->getYear_built_search(),PDO::PARAM_INT);
            $stmt->bindValue(':last_renovation',$improvedsales->getLast_renovation(),PDO::PARAM_STR);
            $stmt->bindValue(':year_built',$improvedsales->getYear_built(),PDO::PARAM_STR);
            $stmt->bindValue(':occupancy_type',$improvedsales->getOccupancy_type(),PDO::PARAM_INT);
            $stmt->bindValue(':building_quality',$improvedsales->getBuilding_quality(),PDO::PARAM_INT);
            $stmt->bindValue(':int_condition',$improvedsales->getInt_condition(),PDO::PARAM_INT);
            $stmt->bindValue(':ext_condition',$improvedsales->getExt_condition(),PDO::PARAM_INT);
            $stmt->bindValue(':const_class',$improvedsales->getConst_class(),PDO::PARAM_INT);
            $stmt->bindValue(':building_class',$improvedsales->getBuilding_class(),PDO::PARAM_INT);
            $stmt->bindValue(':const_descr',$improvedsales->getConst_descr(),PDO::PARAM_STR);
            $stmt->bindValue(':other_const_features',$improvedsales->getOther_const_features(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_stalls',$improvedsales->getParking_stalls(),PDO::PARAM_INT);
            $stmt->bindValue(':parking_type',$improvedsales->getParking_type(),PDO::PARAM_INT);
            $stmt->bindValue(':parking_ratio_nra',$improvedsales->getParking_ratio_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio',$improvedsales->getParking_ratio(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio_gba',$improvedsales->getParking_ratio_gba(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_income_actual_proforma',$improvedsales->getOe_income_actual_proforma(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_income_source',$improvedsales->getOe_income_source(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_only_noi',$improvedsales->getOe_only_noi(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_pgr',$improvedsales->getOe_pgr(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_cam_income',$improvedsales->getOe_cam_income(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_misc_income',$improvedsales->getOe_misc_income(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_pgi',$improvedsales->getOe_pgi(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_vacany_pct',$improvedsales->getOe_vacany_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_vacancy_credit_loss',$improvedsales->getOe_vacancy_credit_loss(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_other_income',$improvedsales->getOe_other_income(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_egi',$improvedsales->getOe_egi(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_expences',$improvedsales->getOe_expences(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_total_other_income',$improvedsales->getOe_total_other_income(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_total_noi',$improvedsales->getOe_total_noi(),PDO::PARAM_INT);
            $stmt->bindValue(':oe_pgr_sf_nra',$improvedsales->getOe_pgr_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_cam_sf_nra',$improvedsales->getOe_cam_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':pgi_sf_nra',$improvedsales->getPgi_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':vacancy_sf_nra',$improvedsales->getVacancy_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':egi_sf_nra',$improvedsales->getEgi_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':expence_sf_nra',$improvedsales->getExpence_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_noi_sf_nra',$improvedsales->getOe_noi_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_expence_ratio',$improvedsales->getOe_expence_ratio(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_reserves',$improvedsales->getOe_reserves(),PDO::PARAM_STR);
            $stmt->bindValue(':oe_management_expence',$improvedsales->getOe_management_expence(),PDO::PARAM_STR);
            $stmt->bindValue(':replace_cost',$improvedsales->getReplace_cost(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_age_years',$improvedsales->getEff_age_years(),PDO::PARAM_INT);
            $stmt->bindValue(':est_rcn',$improvedsales->getEst_rcn(),PDO::PARAM_INT);
            $stmt->bindValue(':less_alloc_imp_price',$improvedsales->getLess_alloc_imp_price(),PDO::PARAM_INT);
            $stmt->bindValue(':depreciation_all_sources',$improvedsales->getDepreciation_all_sources(),PDO::PARAM_INT);
            $stmt->bindValue(':implied_total_pct_deprec',$improvedsales->getImplied_total_pct_deprec(),PDO::PARAM_STR);
            $stmt->bindValue(':physical_depreciation',$improvedsales->getPhysical_depreciation(),PDO::PARAM_STR);
            $stmt->bindValue(':inplied_func_obsol',$improvedsales->getInplied_func_obsol(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);
        
            $result = $stmt->execute();
            if (!$result) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
        
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".PROPERTYTYPE_DETAILS_TABLE." (FK_ReportID, off_fire_sprinkler, off_type_hvac, off_elevator_service, shop_total_gba, shop_inline_sf, shop_anchor_tenant, shop_achor_space_inc, shop_anchor_sf, shop_total_nra, shop_inline_pct, shop_other_tenant, shop_anchor_pct, store_canopy, store_no_fuel, store_chain_affil, store_avg_month_gallon, store_month_store_sales, store_month_car_wash_sales, store_month_mini_sales, store_canopy_desc, store_fuel_desc, store_co_chain_affil, store_total_month_sales, veh_level, veh_tunnel, sfbedroom, sffullbath, sfhalfbath, addstructures, veh_showroom_pct, veh_showroom_sf, veh_service_sf, rest_no_seats, rest_drive_thru, rest_alcohol, rest_playground, ind_int_office_1, ind_int_office_2, ind_total_office, ind_clear_height, ind_storage_mezz_sf, ind_truck_grade, ind_truck_dock, ind_hvac, ind_ext_office_1, ind_ext_office_2, ind_pct_office, ind_storage_mess, ind_mezz_desc, ind_rail, ind_no_rail, ind_fire, ss_code_access, ss_alarm, ss_heat, ss_security, ss_boat, ss_on_site, ss_residence, ss_residence_desc) VALUES (:FK_ReportID, :off_fire_sprinkler, :off_type_hvac, :off_elevator_service, :shop_total_gba, :shop_inline_sf, :shop_anchor_tenant, :shop_achor_space_inc, :shop_anchor_sf, :shop_total_nra, :shop_inline_pct, :shop_other_tenant, :shop_anchor_pct, :store_canopy, :store_no_fuel, :store_chain_affil, :store_avg_month_gallon, :store_month_store_sales, :store_month_car_wash_sales, :store_month_mini_sales, :store_canopy_desc, :store_fuel_desc, :store_co_chain_affil, :store_total_month_sales, :veh_level, :veh_tunnel, :sfbedroom, :sffullbath, :sfhalfbath, :addstructures, :veh_showroom_pct, :veh_showroom_sf, :veh_service_sf, :rest_no_seats, :rest_drive_thru, :rest_alcohol, :rest_playground, :ind_int_office_1, :ind_int_office_2, :ind_total_office, :ind_clear_height, :ind_storage_mezz_sf, :ind_truck_grade, :ind_truck_dock, :ind_hvac, :ind_ext_office_1, :ind_ext_office_2, :ind_pct_office, :ind_storage_mess, :ind_mezz_desc, :ind_rail, :ind_no_rail, :ind_fire, :ss_code_access, :ss_alarm, :ss_heat, :ss_security, :ss_boat, :ss_on_site, :ss_residence, :ss_residence_desc)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".PROPERTYTYPE_DETAILS_TABLE." SET off_fire_sprinkler=:off_fire_sprinkler, off_type_hvac=:off_type_hvac, off_elevator_service=:off_elevator_service, shop_total_gba=:shop_total_gba, shop_inline_sf=:shop_inline_sf, shop_anchor_tenant=:shop_anchor_tenant, shop_achor_space_inc=:shop_achor_space_inc, shop_anchor_sf=:shop_anchor_sf, shop_total_nra=:shop_total_nra, shop_inline_pct=:shop_inline_pct, shop_other_tenant=:shop_other_tenant, shop_anchor_pct=:shop_anchor_pct, store_canopy=:store_canopy, store_no_fuel=:store_no_fuel, store_chain_affil=:store_chain_affil, store_avg_month_gallon=:store_avg_month_gallon, store_month_store_sales=:store_month_store_sales, store_month_car_wash_sales=:store_month_car_wash_sales, store_month_mini_sales=:store_month_mini_sales, store_canopy_desc=:store_canopy_desc, store_fuel_desc=:store_fuel_desc, store_co_chain_affil=:store_co_chain_affil, store_total_month_sales=:store_total_month_sales, veh_level=:veh_level, veh_tunnel=:veh_tunnel, sfbedroom=:sfbedroom, sffullbath=:sffullbath, sfhalfbath=:sfhalfbath, addstructures=:addstructures, veh_showroom_pct=:veh_showroom_pct, veh_showroom_sf=:veh_showroom_sf, veh_service_sf=:veh_service_sf, rest_no_seats=:rest_no_seats, rest_drive_thru=:rest_drive_thru, rest_alcohol=:rest_alcohol, rest_playground=:rest_playground, ind_int_office_1=:ind_int_office_1, ind_int_office_2=:ind_int_office_2, ind_total_office=:ind_total_office, ind_clear_height=:ind_clear_height, ind_storage_mezz_sf=:ind_storage_mezz_sf, ind_truck_grade=:ind_truck_grade, ind_truck_dock=:ind_truck_dock, ind_hvac=:ind_hvac, ind_ext_office_1=:ind_ext_office_1, ind_ext_office_2=:ind_ext_office_2, ind_pct_office=:ind_pct_office, ind_storage_mess=:ind_storage_mess, ind_mezz_desc=:ind_mezz_desc, ind_rail=:ind_rail, ind_no_rail=:ind_no_rail, ind_fire=:ind_fire, ss_code_access=:ss_code_access, ss_alarm=:ss_alarm, ss_heat=:ss_heat, ss_security=:ss_security, ss_boat=:ss_boat, ss_on_site=:ss_on_site, ss_residence=:ss_residence, ss_residence_desc=:ss_residence_desc WHERE ".PROPERTYTYPE_DETAILS_TABLE.".FK_ReportID=:FK_ReportID");
            }
            
            
            $stmt->bindValue(':off_fire_sprinkler',$improvedsales->getOff_fire_sprinkler(),PDO::PARAM_INT);
            $stmt->bindValue(':off_type_hvac',$improvedsales->getOff_type_hvac(),PDO::PARAM_STR);
            $stmt->bindValue(':off_elevator_service',$improvedsales->getOff_elevator_service(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_total_gba',$improvedsales->getShop_total_gba(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_inline_sf',$improvedsales->getShop_inline_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_anchor_tenant',$improvedsales->getShop_anchor_tenant(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_achor_space_inc',$improvedsales->getShop_achor_space_inc(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_anchor_sf',$improvedsales->getShop_anchor_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_total_nra',$improvedsales->getShop_total_nra(),PDO::PARAM_INT);
            $stmt->bindValue(':shop_inline_pct',$improvedsales->getShop_inline_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_other_tenant',$improvedsales->getShop_other_tenant(),PDO::PARAM_STR);
            $stmt->bindValue(':shop_anchor_pct',$improvedsales->getShop_anchor_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':store_canopy',$improvedsales->getStore_canopy(),PDO::PARAM_INT);
            $stmt->bindValue(':store_no_fuel',$improvedsales->getStore_no_fuel(),PDO::PARAM_INT);
            $stmt->bindValue(':store_chain_affil',$improvedsales->getStore_chain_affil(),PDO::PARAM_STR);
            $stmt->bindValue(':store_avg_month_gallon',$improvedsales->getStore_avg_month_gallon(),PDO::PARAM_INT);
            $stmt->bindValue(':store_month_store_sales',$improvedsales->getStore_month_store_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':store_month_car_wash_sales',$improvedsales->getStore_month_car_wash_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':store_month_mini_sales',$improvedsales->getStore_month_mini_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':store_canopy_desc',$improvedsales->getStore_canopy_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':store_fuel_desc',$improvedsales->getStore_fuel_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':store_co_chain_affil',$improvedsales->getStore_co_chain_affil(),PDO::PARAM_STR);
            $stmt->bindValue(':store_total_month_sales',$improvedsales->getStore_total_month_sales(),PDO::PARAM_INT);
            $stmt->bindValue(':veh_level',$improvedsales->getVeh_level(),PDO::PARAM_INT);
            $stmt->bindValue(':veh_tunnel',$improvedsales->getVeh_tunnel(),PDO::PARAM_INT);			
            $stmt->bindValue(':sfbedroom',$improvedsales->getSfbedroom(),PDO::PARAM_INT);
            $stmt->bindValue(':sffullbath',$improvedsales->getSffullbath(),PDO::PARAM_INT);
            $stmt->bindValue(':sfhalfbath',$improvedsales->getSfhalfbath(),PDO::PARAM_INT);
            $stmt->bindValue(':addstructures',$improvedsales->getAddstructures(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_showroom_pct',$improvedsales->getVeh_showroom_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':veh_showroom_sf',$improvedsales->getVeh_showroom_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':veh_service_sf',$improvedsales->getVeh_service_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':rest_no_seats',$improvedsales->getRest_no_seats(),PDO::PARAM_STR);
            $stmt->bindValue(':rest_drive_thru',$improvedsales->getRest_drive_thru(),PDO::PARAM_INT);
            $stmt->bindValue(':rest_alcohol',$improvedsales->getRest_alcohol(),PDO::PARAM_INT);
            $stmt->bindValue(':rest_playground',$improvedsales->getRest_playground(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_int_office_1',$improvedsales->getInd_int_office_1(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_int_office_2',$improvedsales->getInd_int_office_2(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_total_office',$improvedsales->getInd_total_office(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_clear_height',$improvedsales->getInd_clear_height(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_storage_mezz_sf',$improvedsales->getInd_storage_mezz_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_truck_grade',$improvedsales->getInd_truck_grade(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_truck_dock',$improvedsales->getInd_truck_dock(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_hvac',$improvedsales->getInd_hvac(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_ext_office_1',$improvedsales->getInd_ext_office_1(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_ext_office_2',$improvedsales->getInd_ext_office_2(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_pct_office',$improvedsales->getInd_pct_office(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_storage_mess',$improvedsales->getInd_storage_mess(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_mezz_desc',$improvedsales->getInd_mezz_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_rail',$improvedsales->getInd_rail(),PDO::PARAM_INT);
            $stmt->bindValue(':ind_no_rail',$improvedsales->getInd_no_rail(),PDO::PARAM_STR);
            $stmt->bindValue(':ind_fire',$improvedsales->getInd_fire(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_code_access',$improvedsales->getSs_code_access(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_alarm',$improvedsales->getSs_alarm(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_heat',$improvedsales->getSs_heat(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_security',$improvedsales->getSs_security(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_boat',$improvedsales->getSs_boat(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_on_site',$improvedsales->getSs_on_site(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_residence',$improvedsales->getSs_residence(),PDO::PARAM_INT);
            $stmt->bindValue(':ss_residence_desc',$improvedsales->getSs_residence_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);
            
            $result = $stmt->execute();
            if (!$result) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".IMPROVED_UNIT." (FK_ReportID, total_bedroom, bedroom_ratio, parking_ratio_unit, annual_turnover_pct, avg_month_rent_unit, avg_month_rent_sf, total_rooms, density, total_storage_units, avg_unit_size, total_no_units, pgi_unit, expense_unit, vacancy_unit, noi_unit, egi_unit, subsidized_project, subsidized_project_desc, no_single_wide, no_double_wide, no_triple_wide, no_rv_space, no_other_building, other_building_desc, total_space, park_cond, park_quality, space_acre, expense_space, pgi_space, vacancy_space, egi_space, noi_space, price_space, exercise, spa, wash_dry, other_amenities) VALUES (:FK_ReportID, :total_bedroom, :bedroom_ratio, :parking_ratio_unit, :annual_turnover_pct, :avg_month_rent_unit, :avg_month_rent_sf, :total_rooms, :density, :total_storage_units, :avg_unit_size, :total_no_units, :pgi_unit, :expense_unit, :vacancy_unit, :noi_unit, :egi_unit, :subsidized_project, :subsidized_project_desc, :no_single_wide, :no_double_wide, :no_triple_wide, :no_rv_space, :no_other_building, :other_building_desc, :total_space, :park_cond, :park_quality, :space_acre, :expense_space, :pgi_space, :vacancy_space, :egi_space, :noi_space, :price_space, :exercise, :spa, :wash_dry, :other_amenities)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".IMPROVED_UNIT." SET total_bedroom=:total_bedroom, bedroom_ratio=:bedroom_ratio,                     parking_ratio_unit=:parking_ratio_unit, annual_turnover_pct=:annual_turnover_pct, avg_month_rent_unit=:avg_month_rent_unit, avg_month_rent_sf=:avg_month_rent_sf, total_rooms=:total_rooms, density=:density, total_storage_units=:total_storage_units, avg_unit_size=:avg_unit_size, total_no_units=:total_no_units, pgi_unit=:pgi_unit, expense_unit=:expense_unit, vacancy_unit=:vacancy_unit, noi_unit=:noi_unit, egi_unit=:egi_unit, subsidized_project=:subsidized_project, subsidized_project_desc=:subsidized_project_desc, no_single_wide=:no_single_wide, no_double_wide=:no_double_wide, no_triple_wide=:no_triple_wide, no_rv_space=:no_rv_space, no_other_building=:no_other_building, other_building_desc=:other_building_desc, total_space=:total_space, park_cond=:park_cond, park_quality=:park_quality, space_acre=:space_acre, expense_space=:expense_space, pgi_space=:pgi_space, vacancy_space=:vacancy_space, egi_space=:egi_space, noi_space=:noi_space, price_space=:price_space, exercise=:exercise, spa=:spa, wash_dry=:wash_dry, other_amenities=:other_amenities WHERE ".IMPROVED_UNIT.".FK_ReportID=:FK_ReportID");
            }
            
            $stmt->bindValue(':total_bedroom',$improvedsales->getTotal_bedroom(),PDO::PARAM_INT);
            $stmt->bindValue(':bedroom_ratio',$improvedsales->getBedroom_ratio(),PDO::PARAM_STR);
            $stmt->bindValue(':parking_ratio_unit',$improvedsales->getParking_ratio_unit(),PDO::PARAM_STR);
            $stmt->bindValue(':annual_turnover_pct',$improvedsales->getAnnual_turnover_pct(),PDO::PARAM_STR);
            $stmt->bindValue(':avg_month_rent_unit',$improvedsales->getAvg_month_rent_unit(),PDO::PARAM_INT);
            $stmt->bindValue(':avg_month_rent_sf',$improvedsales->getAvg_month_rent_sf(),PDO::PARAM_STR);
            $stmt->bindValue(':total_rooms',$improvedsales->getTotal_rooms(),PDO::PARAM_INT);
            $stmt->bindValue(':density',$improvedsales->getDensity(),PDO::PARAM_STR);
            $stmt->bindValue(':total_storage_units',$improvedsales->getTotal_storage_units(),PDO::PARAM_INT);
            $stmt->bindValue(':avg_unit_size',$improvedsales->getAvg_unit_size(),PDO::PARAM_INT);
            $stmt->bindValue(':total_no_units',$improvedsales->getTotal_no_units(),PDO::PARAM_INT);
            $stmt->bindValue(':pgi_unit',$improvedsales->getPgi_unit(),PDO::PARAM_INT);
            $stmt->bindValue(':expense_unit',$improvedsales->getExpense_unit(),PDO::PARAM_INT);
            $stmt->bindValue(':vacancy_unit',$improvedsales->getVacancy_unit(),PDO::PARAM_INT);
            $stmt->bindValue(':noi_unit',$improvedsales->getNoi_unit(),PDO::PARAM_INT);
            $stmt->bindValue(':egi_unit',$improvedsales->getEgi_unit(),PDO::PARAM_INT);
            $stmt->bindValue(':subsidized_project',$improvedsales->getSubsidized_project(),PDO::PARAM_INT);
            $stmt->bindValue(':subsidized_project_desc',$improvedsales->getSubsidized_project_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':no_single_wide',$improvedsales->getNo_single_wide(),PDO::PARAM_INT);
            $stmt->bindValue(':no_double_wide',$improvedsales->getNo_double_wide(),PDO::PARAM_INT);
            $stmt->bindValue(':no_triple_wide',$improvedsales->getNo_triple_wide(),PDO::PARAM_INT);
            $stmt->bindValue(':no_rv_space',$improvedsales->getNo_rv_space(),PDO::PARAM_INT);
            $stmt->bindValue(':no_other_building',$improvedsales->getNo_other_building(),PDO::PARAM_INT);
            $stmt->bindValue(':other_building_desc',$improvedsales->getOther_building_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':total_space',$improvedsales->getTotal_space(),PDO::PARAM_STR);
            $stmt->bindValue(':park_cond',$improvedsales->getPark_cond(),PDO::PARAM_INT);
            $stmt->bindValue(':park_quality',$improvedsales->getPark_quality(),PDO::PARAM_INT);
            $stmt->bindValue(':space_acre',$improvedsales->getSpace_acre(),PDO::PARAM_STR);
            $stmt->bindValue(':expense_space',$improvedsales->getExpense_space(),PDO::PARAM_INT);
            $stmt->bindValue(':pgi_space',$improvedsales->getPgi_space(),PDO::PARAM_INT);
            $stmt->bindValue(':vacancy_space',$improvedsales->getVacancy_space(),PDO::PARAM_INT);
            $stmt->bindValue(':egi_space',$improvedsales->getEgi_space(),PDO::PARAM_INT);
            $stmt->bindValue(':noi_space',$improvedsales->getNoi_space(),PDO::PARAM_INT);
            $stmt->bindValue(':price_space',$improvedsales->getPrice_space(),PDO::PARAM_INT);
            $stmt->bindValue(':exercise',$improvedsales->getExercise(),PDO::PARAM_INT);
            $stmt->bindValue(':spa',$improvedsales->getSpa(),PDO::PARAM_INT);
            $stmt->bindValue(':wash_dry',$improvedsales->getWash_dry(),PDO::PARAM_INT);
            $stmt->bindValue(':other_amenities',$improvedsales->getOther_amenities(),PDO::PARAM_STR);
            $stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);
            
            $result = $stmt->execute();
            if (!$result) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            

            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".SALES_TRANSACTIONS_TABLE." (FK_ReportID, property_appraised, appraiser_name, mc_job, grantor, grantee, buyer_status, prop_rights_conv, interest_conv, current_use, proposed_use_change, proposed_use_desc, sale_price, record_date, conv_doc_type, conv_doc_rec_no, type_finance, sale_status, list_price_avail, list_price, list_price_change, market_time, fin_term_adj, fin_term_adj_desc, cash_equiv_price, cond_sale_adj, cond_sale_desc, excess_surpluss_sf, excess_surplus_value, excess_surplus_value_desc, defer_maint_cost, defer_main_cost_desc, add_ti_cost, add_ti_cost_desc, broker_cost, broker_cost_desc, stabil_cost, stabil_cost_desc, eff_sale_price_actual, eff_sale_price_stab, adj_price_comment, inc_ffe, desc_ffe, value_ffe, total_value_ffe, underlying_land_value_primary, alloc_land_value, alloc_land_value_source, alloc_imp_value, datasource, confirm_date, inspect_type, inspect_date, mc_file_no, confirm_1_source, relationship_1, confirm_2_souce, relationship_2, market_flyer, adj_price_sf_gba, adj_price_sf_nra, alloc_imp_value_sf_gba, alloc_imp_value_sf_nra, adj_price_unit, adj_price_tunnel, fuel_sales_mult, store_sales_mult, cap_rate, pgim, egim, sale_comments, conf_comments, confirm1, confirm2)
                VALUES (:FK_ReportID, :property_appraised, :appraiser_name, :mc_job, :grantor, :grantee, :buyer_status, :prop_rights_conv, :interest_conv, :current_use, :proposed_use_change, :proposed_use_desc, :sale_price, :record_date, :conv_doc_type, :conv_doc_rec_no, :type_finance, :sale_status, :list_price_avail, :list_price, :list_price_change, :market_time, :fin_term_adj, :fin_term_adj_desc, :cash_equiv_price, :cond_sale_adj, :cond_sale_desc, :excess_surpluss_sf, :excess_surplus_value, :excess_surplus_value_desc, :defer_maint_cost, :defer_main_cost_desc, :add_ti_cost, :add_ti_cost_desc, :broker_cost, :broker_cost_desc, :stabil_cost, :stabil_cost_desc, :eff_sale_price_actual, :eff_sale_price_stab, :adj_price_comment, :inc_ffe, :desc_ffe, :value_ffe, :total_value_ffe, :underlying_land_value_primary, :alloc_land_value, :alloc_land_value_source, :alloc_imp_value, :datasource, :confirm_date, :inspect_type, :inspect_date, :mc_file_no, :confirm_1_source, :relationship_1, :confirm_2_souce, :relationship_2, :market_flyer, :adj_price_sf_gba, :adj_price_sf_nra, :alloc_imp_value_sf_gba, :alloc_imp_value_sf_nra, :adj_price_unit, :adj_price_tunnel, :fuel_sales_mult, :store_sales_mult, :cap_rate, :pgim, :egim, :sale_comments, :conf_comments, :confirm1, :confirm2)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".SALES_TRANSACTIONS_TABLE." SET property_appraised=:property_appraised, appraiser_name=:appraiser_name, mc_job=:mc_job, grantor=:grantor, grantee=:grantee, buyer_status=:buyer_status, prop_rights_conv=:prop_rights_conv, interest_conv=:interest_conv, current_use=:current_use, proposed_use_change=:proposed_use_change, proposed_use_desc=:proposed_use_desc, sale_price=:sale_price, record_date=:record_date, conv_doc_type=:conv_doc_type, conv_doc_rec_no=:conv_doc_rec_no, type_finance=:type_finance, sale_status=:sale_status, list_price_avail=:list_price_avail, list_price=:list_price, list_price_change=:list_price_change, market_time=:market_time, fin_term_adj=:fin_term_adj, fin_term_adj_desc=:fin_term_adj_desc, cash_equiv_price=:cash_equiv_price, cond_sale_adj=:cond_sale_adj, cond_sale_desc=:cond_sale_desc, excess_surpluss_sf=:excess_surpluss_sf, excess_surplus_value=:excess_surplus_value, excess_surplus_value_desc=:excess_surplus_value_desc, defer_maint_cost=:defer_maint_cost, defer_main_cost_desc=:defer_main_cost_desc, add_ti_cost=:add_ti_cost, add_ti_cost_desc=:add_ti_cost_desc, broker_cost=:broker_cost, broker_cost_desc=:broker_cost_desc, stabil_cost=:stabil_cost, stabil_cost_desc=:stabil_cost_desc, eff_sale_price_actual=:eff_sale_price_actual, eff_sale_price_stab=:eff_sale_price_stab, adj_price_comment=:adj_price_comment, inc_ffe=:inc_ffe, desc_ffe=:desc_ffe, value_ffe=:value_ffe, total_value_ffe=:total_value_ffe, underlying_land_value_primary=:underlying_land_value_primary, alloc_land_value=:alloc_land_value, alloc_land_value_source=:alloc_land_value_source, alloc_imp_value=:alloc_imp_value, datasource=:datasource, confirm_date=:confirm_date, inspect_type=:inspect_type, inspect_date=:inspect_date, mc_file_no=:mc_file_no, confirm_1_source=:confirm_1_source, relationship_1=:relationship_1, confirm_2_souce=:confirm_2_souce, relationship_2=:relationship_2, market_flyer=:market_flyer, adj_price_sf_gba=:adj_price_sf_gba, adj_price_sf_nra=:adj_price_sf_nra, alloc_imp_value_sf_gba=:alloc_imp_value_sf_gba, alloc_imp_value_sf_nra=:alloc_imp_value_sf_nra, adj_price_unit=:adj_price_unit, adj_price_tunnel=:adj_price_tunnel, fuel_sales_mult=:fuel_sales_mult, store_sales_mult=:store_sales_mult, cap_rate=:cap_rate, pgim=:pgim, egim=:egim, sale_comments=:sale_comments, conf_comments=:conf_comments, confirm1=:confirm1, confirm2=:confirm2 WHERE ".SALES_TRANSACTIONS_TABLE.".FK_ReportID=:FK_ReportID");
            }
        
            $stmt->bindValue(':property_appraised',$improvedsales->getProperty_appraised(),PDO::PARAM_INT);
            $stmt->bindValue(':appraiser_name',$improvedsales->getAppraiser_name(),PDO::PARAM_STR);
            $stmt->bindValue(':mc_job',$improvedsales->getMc_job(),PDO::PARAM_STR);
            $stmt->bindValue(':grantor',$improvedsales->getGrantor(),PDO::PARAM_STR);
            $stmt->bindValue(':grantee',$improvedsales->getGrantee(),PDO::PARAM_STR);
            $stmt->bindValue(':buyer_status',$improvedsales->getBuyer_status(),PDO::PARAM_INT);
            $stmt->bindValue(':prop_rights_conv',$improvedsales->getProp_rights_conv(),PDO::PARAM_INT);
            $stmt->bindValue(':interest_conv',$improvedsales->getInterest_conv(),PDO::PARAM_STR);
            $stmt->bindValue(':current_use',$improvedsales->getCurrent_use(),PDO::PARAM_STR);
            $stmt->bindValue(':proposed_use_change',$improvedsales->getProposed_use_change(),PDO::PARAM_INT);
            $stmt->bindValue(':proposed_use_desc',$improvedsales->getProposed_use_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':sale_price',$improvedsales->getSale_price(),PDO::PARAM_INT);
            $stmt->bindValue(':record_date',$improvedsales->getRecord_date(),PDO::PARAM_STR);
            $stmt->bindValue(':conv_doc_type',$improvedsales->getConv_doc_type(),PDO::PARAM_INT);
            $stmt->bindValue(':conv_doc_rec_no',$improvedsales->getConv_doc_rec_no(),PDO::PARAM_STR);
            $stmt->bindValue(':type_finance',$improvedsales->getType_finance(),PDO::PARAM_STR);
            $stmt->bindValue(':sale_status',$improvedsales->getSale_status(),PDO::PARAM_INT);
            $stmt->bindValue(':list_price_avail',$improvedsales->getList_price_avail(),PDO::PARAM_INT);
            $stmt->bindValue(':list_price',$improvedsales->getList_price(),PDO::PARAM_INT);
            $stmt->bindValue(':list_price_change',$improvedsales->getList_price_change(),PDO::PARAM_STR);
            $stmt->bindValue(':market_time',$improvedsales->getMarket_time(),PDO::PARAM_STR);
            $stmt->bindValue(':fin_term_adj',$improvedsales->getFin_term_adj(),PDO::PARAM_INT);
            $stmt->bindValue(':fin_term_adj_desc',$improvedsales->getFin_term_adj_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':cash_equiv_price',$improvedsales->getCash_equiv_price(),PDO::PARAM_INT);
            $stmt->bindValue(':cond_sale_adj',$improvedsales->getCond_sale_adj(),PDO::PARAM_INT);
            $stmt->bindValue(':cond_sale_desc',$improvedsales->getCond_sale_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':excess_surpluss_sf',$improvedsales->getExcess_surpluss_sf(),PDO::PARAM_INT);
            $stmt->bindValue(':excess_surplus_value',$improvedsales->getExcess_surplus_value(),PDO::PARAM_INT);
            $stmt->bindValue(':excess_surplus_value_desc',$improvedsales->getExcess_surplus_value_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':defer_maint_cost',$improvedsales->getDefer_maint_cost(),PDO::PARAM_INT);
            $stmt->bindValue(':defer_main_cost_desc',$improvedsales->getDefer_main_cost_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':add_ti_cost',$improvedsales->getAdd_ti_cost(),PDO::PARAM_INT);
            $stmt->bindValue(':add_ti_cost_desc',$improvedsales->getAdd_ti_cost_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':broker_cost',$improvedsales->getBroker_cost(),PDO::PARAM_INT);
            $stmt->bindValue(':broker_cost_desc',$improvedsales->getBroker_cost_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':stabil_cost',$improvedsales->getStabil_cost(),PDO::PARAM_INT);
            $stmt->bindValue(':stabil_cost_desc',$improvedsales->getStabil_cost_desc(),PDO::PARAM_STR);
            $stmt->bindValue(':eff_sale_price_actual',$improvedsales->getEff_sale_price_actual(),PDO::PARAM_INT);
            $stmt->bindValue(':eff_sale_price_stab',$improvedsales->getEff_sale_price_stab(),PDO::PARAM_INT);
            $stmt->bindValue(':adj_price_comment',$improvedsales->getAdj_price_comment(),PDO::PARAM_STR);
            $stmt->bindValue(':inc_ffe',$improvedsales->getInc_ffe(),PDO::PARAM_INT);
            $stmt->bindValue(':desc_ffe',$improvedsales->getDesc_ffe(),PDO::PARAM_STR);
            $stmt->bindValue(':value_ffe',$improvedsales->getValue_ffe(),PDO::PARAM_INT);
            $stmt->bindValue(':total_value_ffe',$improvedsales->getTotal_value_ffe(),PDO::PARAM_INT);
            $stmt->bindValue(':underlying_land_value_primary',$improvedsales->getUnderlying_land_value_primary(),PDO::PARAM_STR);
            $stmt->bindValue(':alloc_land_value',$improvedsales->getAlloc_land_value(),PDO::PARAM_INT);
            $stmt->bindValue(':alloc_land_value_source',$improvedsales->getAlloc_land_value_source(),PDO::PARAM_STR);
            $stmt->bindValue(':alloc_imp_value',$improvedsales->getAlloc_imp_value(),PDO::PARAM_INT);
            $stmt->bindValue(':datasource',$improvedsales->getDatasource(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_date',$improvedsales->getConfirm_date(),PDO::PARAM_STR);
            $stmt->bindValue(':inspect_type',$improvedsales->getInspect_type(),PDO::PARAM_INT);
            $stmt->bindValue(':inspect_date',$improvedsales->getInspect_date(),PDO::PARAM_STR);
            $stmt->bindValue(':mc_file_no',$improvedsales->getMc_file_no(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_1_source',$improvedsales->getConfirm_1_source(),PDO::PARAM_STR);
            $stmt->bindValue(':relationship_1',$improvedsales->getRelationship_1(),PDO::PARAM_STR);
            $stmt->bindValue(':confirm_2_souce',$improvedsales->getConfirm_2_souce(),PDO::PARAM_STR);
            $stmt->bindValue(':relationship_2',$improvedsales->getRelationship_2(),PDO::PARAM_STR);
            $stmt->bindValue(':market_flyer',$improvedsales->getMarket_flyer(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_sf_gba',$improvedsales->getAdj_price_sf_gba(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_sf_nra',$improvedsales->getAdj_price_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':alloc_imp_value_sf_gba',$improvedsales->getAlloc_imp_value_sf_gba(),PDO::PARAM_STR);
            $stmt->bindValue(':alloc_imp_value_sf_nra',$improvedsales->getAlloc_imp_value_sf_nra(),PDO::PARAM_STR);
            $stmt->bindValue(':adj_price_unit',$improvedsales->getAdj_price_unit(),PDO::PARAM_INT);
            $stmt->bindValue(':adj_price_tunnel',$improvedsales->getAdj_price_tunnel(),PDO::PARAM_INT);
            $stmt->bindValue(':fuel_sales_mult',$improvedsales->getFuel_sales_mult(),PDO::PARAM_STR);
            $stmt->bindValue(':store_sales_mult',$improvedsales->getStore_sales_mult(),PDO::PARAM_STR);
            $stmt->bindValue(':cap_rate',$improvedsales->getCap_rate(),PDO::PARAM_STR);
            $stmt->bindValue(':pgim',$improvedsales->getPgim(),PDO::PARAM_STR);
            $stmt->bindValue(':egim',$improvedsales->getEgim(),PDO::PARAM_STR);
            $stmt->bindValue(':sale_comments',$improvedsales->getSale_comments(),PDO::PARAM_STR);
            $stmt->bindValue(':conf_comments',$improvedsales->getConf_comments(),PDO::PARAM_STR);
			$stmt->bindValue(':confirm1',$improvedsales->getConfirm1(),PDO::PARAM_INT);
            $stmt->bindValue(':confirm2',$improvedsales->getConfirm2(),PDO::PARAM_INT);
            $stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);
        
            $result = $stmt->execute();
            if (!$result) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $allAssessed = array();
			if(isset($_POST['assessedids'])){
				if(stristr($_POST['assessedids'],",")!==false){
					$allAssessed = explode(",",$_POST['assessedids']);
				}else{
					$allAssessed[] = $_POST['assessedids'];
				}
			}
			
			$assessedvalues = $improvedsales->getAssessedvalues();
	
			for($p=0;$p<count($assessedvalues);$p++){
				if($assessedvalues[$p]->getId()!=0){
					$stmt = $this->db->prepare("UPDATE ".ASSESSED_TABLE." SET mappage=:mappage_".$p.", taxlot=:taxlot_".$p.", parcelno=:parcelno_".$p.", assessedglasf=:assessedglasf_".$p.", marketland=:marketland_".$p.", marketimp=:marketimp_".$p.", markettotal=:markettotal_".$p.", measure50=:measure50_".$p.", annualtaxes=:annualtaxes_".$p." WHERE ".ASSESSED_TABLE.".FK_ReportID=:FK_ReportID AND ".ASSESSED_TABLE.".id=:id_".$p."");
					$stmt->bindValue(':id_'.$p,$assessedvalues[$p]->getId(),PDO::PARAM_INT);
				}else{
					$stmt = $this->db->prepare("INSERT INTO ".ASSESSED_TABLE." (FK_ReportID,mappage,taxlot,parcelno,assessedglasf,marketland,marketimp,markettotal,measure50,annualtaxes) VALUES (:FK_ReportID,:mappage_".$p.",:taxlot_".$p.",:parcelno_".$p.",:assessedglasf_".$p.",:marketland_".$p.",:marketimp_".$p.",:markettotal_".$p.",:measure50_".$p.",:annualtaxes_".$p.")");
				}

				$stmt->bindValue(':mappage_'.$p,$assessedvalues[$p]->getMappage(),PDO::PARAM_STR);
				$stmt->bindValue(':taxlot_'.$p,$assessedvalues[$p]->getTaxlot(),PDO::PARAM_STR);
				$stmt->bindValue(':parcelno_'.$p,$assessedvalues[$p]->getParcelno(),PDO::PARAM_STR);
				$stmt->bindValue(':assessedglasf_'.$p,$assessedvalues[$p]->getAssessedglasf(),PDO::PARAM_INT);
				$stmt->bindValue(':marketland_'.$p,$assessedvalues[$p]->getMarketland(),PDO::PARAM_INT);
				$stmt->bindValue(':marketimp_'.$p,$assessedvalues[$p]->getMarketimp(),PDO::PARAM_INT);
				$stmt->bindValue(':markettotal_'.$p,$assessedvalues[$p]->getMarkettotal(),PDO::PARAM_INT);
				$stmt->bindValue(':measure50_'.$p,$assessedvalues[$p]->getMeasure50(),PDO::PARAM_INT);
				$stmt->bindValue(':annualtaxes_'.$p,$assessedvalues[$p]->getAnnualtaxes(),PDO::PARAM_STR);
				$stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);

				$stmt->execute();
				$index = array_search($assessedvalues[$p]->getId(),$allAssessed);
				if($index!==false){
					array_splice($allAssessed,$index,1);
				}
			}
			
			for($p=0;$p<count($allAssessed);$p++){
				$stmt = $this->db->prepare("DELETE FROM ".ASSESSED_TABLE." WHERE ".ASSESSED_TABLE.".id=:id_".$p."");
				$stmt->bindValue(':id_'.$p,$allAssessed[$p],PDO::PARAM_INT);
				$stmt->execute();
			}
            
            $allMfs = array();
			if(isset($_POST['mfids'])){
				if(stristr($_POST['mfids'],",")!==false){
					$allMfs = explode(",",$_POST['mfids']);
				}else{
					$allMfs[] = $_POST['mfids'];
				}
			}
			
			$mfvalues = $improvedsales->getMfValues();
			for($p=0;$p<count($mfvalues);$p++){
				if($mfvalues[$p]->getId()!=0){
					$stmt = $this->db->prepare("UPDATE ".MFMATRIX_TABLE." SET mfnounits=:mfnounits_".$p.", mfsize=:mfsize_".$p.", mftotalsf=:mftotalsf_".$p.", mfrent=:mfrent_".$p.", mfrentsf=:mfrentsf_".$p.", mfnobr=:mfnobr_".$p." WHERE ".MFMATRIX_TABLE.".FK_ReportID=:FK_ReportID AND ".MFMATRIX_TABLE.".id=:id_".$p."");
					$stmt->bindValue(':id_'.$p,$mfvalues[$p]->getId(),PDO::PARAM_INT);
				}else{
					$stmt = $this->db->prepare("INSERT INTO ".MFMATRIX_TABLE." (FK_ReportID,mfnounits,mfsize,mftotalsf,mfrent,mfrentsf,mfnobr) VALUES (:FK_ReportID,:mfnounits_".$p.",:mfsize_".$p.",:mftotalsf_".$p.",:mfrent_".$p.",:mfrentsf_".$p.",:mfnobr_".$p.")");
				}

				$stmt->bindValue(':mfnounits_'.$p,$mfvalues[$p]->getMfnounits(),PDO::PARAM_INT);
				$stmt->bindValue(':mfsize_'.$p,$mfvalues[$p]->getMfsize(),PDO::PARAM_STR);
				$stmt->bindValue(':mftotalsf_'.$p,$mfvalues[$p]->getMftotalsf(),PDO::PARAM_INT);
				$stmt->bindValue(':mfrent_'.$p,$mfvalues[$p]->getMfrent(),PDO::PARAM_INT);
				$stmt->bindValue(':mfrentsf_'.$p,$mfvalues[$p]->getMfrentsf(),PDO::PARAM_STR);
				$stmt->bindValue(':mfnobr_'.$p,$mfvalues[$p]->getmfnobr(),PDO::PARAM_INT);
				$stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);

				$result = $stmt->execute();
				if (!$result) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
				$index = array_search($mfvalues[$p]->getId(),$allMfs);
				if($index!==false){
					array_splice($allMfs,$index,1);
				}
			}
			
			for($p=0;$p<count($allMfs);$p++){
				$stmt = $this->db->prepare("DELETE FROM ".MFMATRIX_TABLE." WHERE ".MFMATRIX_TABLE.".id=:id_".$p."");
				$stmt->bindValue(':id_'.$p,$allMfs[$p],PDO::PARAM_INT);
				$result = $stmt->execute();
				if (!$result) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
			}
        
            $stmt = $this->db->prepare("DELETE FROM ".DOC_LINKS." WHERE FK_ReportID=:FK_ReportID");
            $stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);
            $result = $stmt->execute();
            if (!$result) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            
            $directory = "../comp_images/".$improvedsales->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }

            $images = array();
			foreach ($_FILES['images']['name'] as $key => $val ) {
                $upload_dir = "../comp_images/" . $improvedsales->getId() . "/";
                $upload_image = $upload_dir.$_FILES['images']['name'][$key];
                $file_name = $_FILES['images']['name'][$key];
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image)) {                
					$mediaUtilities->imageTransformations($file_name,$upload_dir,400,400,100,"","","resize",true);
                    $images[] = $upload_image;
                    $FK_ReportID = $improvedsales->getId();
                        if (!empty($images)){                       
                            $caption = $_POST['caption'][$key];
							// insert uploaded images details into MySQL database.
							$stmt = $this->db->prepare("INSERT INTO propphotos (photopath, FK_ReportID, caption) VALUES('" . $file_name . "', '" . $FK_ReportID . "', '" . $caption . "')");
							$stmt->execute(); 
                        }
                }
            }
			$picOrder = explode(",",$_POST['picorder']);
			for($p=0;$p<count($picOrder);$p++){
				$FK_ReportID = $improvedsales->getId();
				$stmt = $this->db->prepare("UPDATE propphotos SET propphotos.order = '".($p+1)."' WHERE FK_ReportID = '".$FK_ReportID."' AND photopath='".$picOrder[$p]."'");
				$stmt->execute(); 
			}

            for($d=0;$d<count($improvedsales->getDocData());$d++){
                $stmt = $this->db->prepare("INSERT INTO ".DOC_LINKS." (boxurl, file_label,FK_ReportID) VALUES  (:boxurl,:file_label,:FK_ReportID)");
                $stmt->bindValue(':boxurl',$improvedsales->getDocData()[$d]->boxurl,PDO::PARAM_STR);
                $stmt->bindValue(':file_label',$improvedsales->getDocData()[$d]->file_label,PDO::PARAM_STR);
                $stmt->bindValue(':FK_ReportID',$improvedsales->getId(),PDO::PARAM_INT);
                $result = $stmt->execute();
				if (!$result) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
            }

        $this->db->commit();
            
        }catch (PDOException $e) {
            print_r($e);
            $this->db->rollBack(); //cancel db changes if something goes wrong
            return $improvedsales;
            die();
        }
        
        return $improvedsales;
    }
}
?>
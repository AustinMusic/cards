<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <w:document xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:wp14="http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing" xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main" xmlns:w14="http://schemas.microsoft.com/office/word/2010/wordml" xmlns:wpg="http://schemas.microsoft.com/office/word/2010/wordprocessingGroup" xmlns:wpi="http://schemas.microsoft.com/office/word/2010/wordprocessingInk" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wps="http://schemas.microsoft.com/office/word/2010/wordprocessingShape" mc:Ignorable="w14 wp14">
      <w:body>
          <w:p w:rsidR="00EE183E" w:rsidRPr="00EE183E" w:rsidRDefault="00EE183E" w:rsidP="00EE183E">
            <w:pPr>
              <w:spacing w:line="240" w:lineRule="auto"/>
              <w:rPr>
                <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Segoe UI"/>
                <w:color w:val="0A4759"/>
                <w:kern w:val="20"/>
                <w:szCs w:val="24"/>
              </w:rPr>
            </w:pPr>
          </w:p>
          <w:tbl>
            <w:tblPr>
              <w:tblW w:w="10080" w:type="dxa"/>
            <!--  <w:tblCellSpacing w:w="7" w:type="dxa"/>-->
              <w:tblInd w:w="14" w:type="dxa"/>
              <w:tblCellMar>
              <w:start w:w="1000" w:type="dxa"/>
              </w:tblCellMar>
              <w:tblLook w:val="01E0" w:firstRow="1" w:lastRow="1" w:firstColumn="1" w:lastColumn="1" w:noHBand="0" w:noVBand="0"/>
            </w:tblPr>
     <!--       <w:tblGrid>
              <w:gridCol w:w="1800"/>
              <w:gridCol w:w="360"/>
              <w:gridCol w:w="2700"/>
              <w:gridCol w:w="1256"/>
              <w:gridCol w:w="424"/>
              <w:gridCol w:w="660"/>
              <w:gridCol w:w="720"/>
              <w:gridCol w:w="420"/>
              <w:gridCol w:w="660"/>
              <w:gridCol w:w="1080"/>
            </w:tblGrid>-->
             <xsl:variable name="size" select="count(root/row)"/>
        <xsl:for-each name="count" select="root/row[ceiling($size div 2) &gt;= position()]">
			
			<xsl:variable name="level0Count" select="position()"/>
			<xsl:variable name="imageid" select="position()+1"/>
			    <xsl:variable name="level1Count" select="position() - 1"/>
        <xsl:variable name="level2Count" select="$level1Count * 2 + position()"/>
            <w:tr w:rsidR="00085897" w:rsidRPr="008B1EA8" w:rsidTr="00F75B40">
              <w:trPr>
				  <w:trHeight w:val="3340" w:hRule="exact"/>
           <!--     <w:tblCellSpacing w:w="7" w:type="dxa"/>-->
              </w:trPr>
              <w:tc>
                <w:tcPr>
                 <!-- <w:tcW w:w="5199" w:type="dxa"/>
                  <w:gridSpan w:val="7"/>-->
                  <w:vMerge w:val="restart"/>
                </w:tcPr>
                <w:p w:rsidR="00085897" w:rsidRPr="008B1EA8" w:rsidRDefault="00600DD5" w:rsidP="00600DD5">
                  <w:pPr>	  
                    <w:jc w:val="center"/>
                  </w:pPr>
                  <w:bookmarkStart w:id="0" w:name="_GoBack"/>
                  <w:r>
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Segoe UI"/>
                      <w:noProof/>
                    </w:rPr>
                    <w:drawing>
                      <wp:anchor distT="0" distB="0" distL="114300" distR="114300" simplePos="0" relativeHeight="251658240" behindDoc="0" locked="0" layoutInCell="1" allowOverlap="1">
                        <wp:simplePos x="3854450" y="-1457960"/>
                        <wp:positionH relativeFrom="margin">
                          <wp:align>left</wp:align>
                        </wp:positionH>
                        <wp:positionV relativeFrom="margin">
                          <wp:align>center</wp:align>
                        </wp:positionV>
                        <wp:extent cx="2533650" cy="1905000"/>
                        <wp:effectExtent l="0" t="0" r="3175" b="6985"/>
                        <wp:wrapSquare wrapText="bothSides"/>
                        <wp:docPr id="2" name="Picture 2" descr="Subject Photo" title="Subject Photo"/>
                        <wp:cNvGraphicFramePr>
                          <a:graphicFrameLocks xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" noChangeAspect="1"/>
                        </wp:cNvGraphicFramePr>
                        <a:graphic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main">
                          <a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture">
                            <pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">
                              <pic:nvPicPr>
                                <pic:cNvPr id="0" name="IMG_0675.JPG"/>
                                <pic:cNvPicPr/>
                              </pic:nvPicPr>
                              <pic:blipFill>
                                <a:blip r:embed="rId$level0Count" cstate="print">
                                  <a:extLst>
                                    <a:ext uri="">
                                      <a14:useLocalDpi xmlns:a14="http://schemas.microsoft.com/office/drawing/2010/main" val="0"/>
                                    </a:ext>
                                  </a:extLst>
                                </a:blip>
                                <a:stretch>
                                  <a:fillRect/>
                                </a:stretch>
                              </pic:blipFill>
                              <pic:spPr>
                                <a:xfrm>
                                  <a:off x="0" y="0"/>
                                  <a:ext cx="3140075" cy="2355215"/>
                                </a:xfrm>
                                <a:prstGeom prst="rect">
                                  <a:avLst/>
                                </a:prstGeom>
                                <a:ln  w="5080"><a:solidFill><a:srgbClr val="0000"/></a:solidFill></a:ln>
                              </pic:spPr>
                            </pic:pic>
                          </a:graphicData>
                        </a:graphic>
                      </wp:anchor>
                    </w:drawing>
                  </w:r>
                  <w:bookmarkEnd w:id="0"/>
                </w:p>
              </w:tc>
              <xsl:if test="following::row[ceiling($size div 2)]/city!=''">
                   <w:tc>
                <w:tcPr>
                 <!-- <w:tcW w:w="5040" w:type="dxa"/>
                  <w:gridSpan w:val="7"/>-->
                  <w:vMerge w:val="restart"/>
                </w:tcPr>
                <w:p w:rsidR="00085897" w:rsidRPr="008B1EA8" w:rsidRDefault="00600DD5" w:rsidP="00600DD5">
                  <w:pPr>
                    <w:jc w:val="center"/>
                  </w:pPr>
                  <w:bookmarkStart w:id="0" w:name="_GoBack"/>
                  <w:r>
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Segoe UI"/>
                      <w:noProof/>
                    </w:rPr>
                    <w:drawing>
                      <wp:anchor distT="0" distB="0" distL="114300" distR="114300" simplePos="0" relativeHeight="251658240" behindDoc="0" locked="0" layoutInCell="1" allowOverlap="1">
                        <wp:simplePos x="3854450" y="-1457960"/>
                        <wp:positionH relativeFrom="margin">
                          <wp:align>center</wp:align>
                        </wp:positionH>
                        <wp:positionV relativeFrom="margin">
                          <wp:align>center</wp:align>
                        </wp:positionV>
                        <wp:extent cx="2533650" cy="1905000"/>
                        <wp:effectExtent l="0" t="0" r="3175" b="6985"/>
                        <wp:wrapSquare wrapText="bothSides"/>
                        <wp:docPr id="2" name="Picture 2" descr="Subject Photo" title="Subject Photo"/>
                        <wp:cNvGraphicFramePr>
                          <a:graphicFrameLocks xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" noChangeAspect="1"/>
                        </wp:cNvGraphicFramePr>
                        <a:graphic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main">
                          <a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture">
                            <pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">
                              <pic:nvPicPr>
                                <pic:cNvPr id="0" name="IMG_0675.JPG"/>
                                <pic:cNvPicPr/>
                              </pic:nvPicPr>
                              <pic:blipFill>
                                <a:blip r:embed="rId$imageid" cstate="print">
                                  <a:extLst>
                                    <a:ext uri="">
                                      <a14:useLocalDpi xmlns:a14="http://schemas.microsoft.com/office/drawing/2010/main" val="0"/>
                                    </a:ext>
                                  </a:extLst>
                                </a:blip>
                                <a:stretch>
                                  <a:fillRect/>
                                </a:stretch>
                              </pic:blipFill>
                              <pic:spPr>
                                <a:xfrm>
                                  <a:off x="0" y="0"/>
                                  <a:ext cx="3140075" cy="2355215"/>
                                </a:xfrm>
                                <a:prstGeom prst="rect">
                                  <a:avLst/>
                                </a:prstGeom>
                            <a:ln w="5080"><a:solidFill><a:srgbClr val="0000"/></a:solidFill></a:ln>
                              </pic:spPr>
                            </pic:pic>
                          </a:graphicData>
                        </a:graphic>
                      </wp:anchor>
                    </w:drawing>
                  </w:r>
                  <w:bookmarkEnd w:id="0"/>
                </w:p>
              </w:tc>
              </xsl:if> 
            </w:tr>
          <w:tr>
<w:trPr>
				  <w:trHeight w:val="280" w:hRule="exact"/>
           <!--     <w:tblCellSpacing w:w="7" w:type="dxa"/>-->
              </w:trPr>
                         <w:tc>
                <w:tcPr>    
					<w:tcMar>
         <w:start w:w="2320" w:type="dxa"/>
          </w:tcMar>					      
                </w:tcPr>
                <w:p w:rsidR="00085897" w:rsidRPr="008B1EA8" w:rsidRDefault="00F75B40" w:rsidP="00BD7A5F">
					   <w:pPr>
                    <w:tabs>
                      <w:tab w:val="left" w:pos="5382"/>
                    </w:tabs>
                    <w:jc w:val="left"/>
                    </w:pPr>                             
					   <w:r>
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Arial"/>
                      <w:sz w:val="18"/>
                      <w:szCs w:val="18"/>
                      <w:b w:val="true" />
                    </w:rPr>
                                 <xsl:choose>
         <xsl:when test="position()=1">
                    <w:t>Improved Sale <xsl:value-of select="position()"/><w:b /></w:t>
         </xsl:when>
         <xsl:otherwise>
                    <w:t>Improved Sale <xsl:value-of select="2*position()-1"/><w:b /></w:t>
         </xsl:otherwise>
       </xsl:choose>
       <w:br/>
       </w:r>
       </w:p>
         </w:tc>
         
        <w:tc>
                <w:tcPr>  
					<w:tcMar>
         <w:start w:w="2320" w:type="dxa"/>
          </w:tcMar>        
                </w:tcPr>
                <w:p w:rsidR="00085897" w:rsidRPr="008B1EA8" w:rsidRDefault="00F75B40" w:rsidP="00BD7A5F">
                  <w:pPr>
                    <w:tabs>
                      <w:tab w:val="left" w:pos="5382"/>
                    </w:tabs>
                    <w:jc w:val="left"/>
                          </w:pPr>
						    <w:r>
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Arial"/>
                      <w:sz w:val="18"/>
                      <w:szCs w:val="18"/>
                      <w:b w:val="true" />
                    </w:rPr>
                                   <xsl:choose>
         <xsl:when test="position()=1">
                    <w:t>Improved Sale <xsl:value-of select="position()+1"/></w:t>
         </xsl:when>
         <xsl:otherwise>
			 <xsl:if test="following::row[ceiling($size div 2)]/city!=''">
                    <w:t>Improved Sale <xsl:value-of select="2*position()"/></w:t>
                    </xsl:if>
         </xsl:otherwise>
       </xsl:choose>
       <w:br/>
       </w:r>
       </w:p>
       </w:tc>
          </w:tr>     
          
            <w:tr w:rsidR="00085897" w:rsidRPr="008B1EA8">
              <w:trPr>
              </w:trPr>       
              <w:tc>
                <w:tcPr>    
					<w:tcMar>
         <w:start w:w="1520" w:type="dxa"/>
          </w:tcMar>					      
                </w:tcPr>
                <w:p w:rsidR="00085897" w:rsidRPr="008B1EA8" w:rsidRDefault="00F75B40" w:rsidP="00BD7A5F">
                  <w:pPr>
                    <w:tabs>
                      <w:tab w:val="left" w:pos="5382"/>
                    </w:tabs>
                    <w:jc w:val="left"/>
                                  
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Arial"/>
                      <w:sz w:val="18"/>
                      <w:szCs w:val="18"/>
                    </w:rPr>
                  </w:pPr>
                  
                  <w:r w:rsidRPr="00F75B40">
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Arial"/>
                      <w:sz w:val="18"/>
                      <w:szCs w:val="18"/>
                    </w:rPr>
                    <w:t><xsl:value-of select="address"/></w:t><w:t xml:space="preserve">, </w:t><w:t><xsl:value-of select="city"/></w:t><w:t xml:space="preserve">, </w:t><w:t><xsl:value-of select="shortname"/></w:t>
                  </w:r>
                </w:p>
              </w:tc>
               <xsl:if test="following::row[ceiling($size div 2)]/city!=''">
              <w:tc>
                <w:tcPr>  
					<w:tcMar>
         <w:start w:w="1520" w:type="dxa"/>
         <w:start w:w="1520" w:type="dxa"/>
          </w:tcMar>        
                </w:tcPr>
                <w:p w:rsidR="00085897" w:rsidRPr="008B1EA8" w:rsidRDefault="00F75B40" w:rsidP="00BD7A5F">
                  <w:pPr>
                    <w:tabs>
                      <w:tab w:val="left" w:pos="5382"/>
                    </w:tabs>
                    <w:jc w:val="left"/>                    
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Arial"/>           
                    </w:rPr>
                  </w:pPr>
                  <w:r w:rsidRPr="00F75B40">
                    <w:rPr>
                      <w:rFonts w:ascii="Calibri" w:hAnsi="Calibri" w:cs="Arial"/>
                      <w:sz w:val="18"/>
                      <w:szCs w:val="18"/>
                    </w:rPr>
                    <w:t><xsl:value-of select="following::row[ceiling($size div 2)]/address"/></w:t><w:t xml:space="preserve">, </w:t><w:t><xsl:value-of select="following::row[ceiling($size div 2)]/city"/><w:t xml:space="preserve">, </w:t><xsl:value-of select="following::row[ceiling($size div 2)]/shortname"/></w:t>
                  </w:r>
                </w:p>
              </w:tc>
               </xsl:if>
            </w:tr>
             <w:br/>
            </xsl:for-each>
          </w:tbl>
      </w:body>
    </w:document>
  </xsl:template>
</xsl:stylesheet>

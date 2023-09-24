<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <w:document xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:cx="http://schemas.microsoft.com/office/drawing/2014/chartex" xmlns:cx1="http://schemas.microsoft.com/office/drawing/2015/9/8/chartex" xmlns:cx2="http://schemas.microsoft.com/office/drawing/2015/10/21/chartex" xmlns:cx3="http://schemas.microsoft.com/office/drawing/2016/5/9/chartex" xmlns:cx4="http://schemas.microsoft.com/office/drawing/2016/5/10/chartex" xmlns:cx5="http://schemas.microsoft.com/office/drawing/2016/5/11/chartex" xmlns:cx6="http://schemas.microsoft.com/office/drawing/2016/5/12/chartex" xmlns:cx7="http://schemas.microsoft.com/office/drawing/2016/5/13/chartex" xmlns:cx8="http://schemas.microsoft.com/office/drawing/2016/5/14/chartex" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:aink="http://schemas.microsoft.com/office/drawing/2016/ink" xmlns:am3d="http://schemas.microsoft.com/office/drawing/2017/modeaad" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:wp14="http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing" xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main" xmlns:w14="http://schemas.microsoft.com/office/word/2010/wordml" xmlns:w15="http://schemas.microsoft.com/office/word/2012/wordml" xmlns:w16cid="http://schemas.microsoft.com/office/word/2016/wordml/cid" xmlns:w16se="http://schemas.microsoft.com/office/word/2015/wordml/symex" xmlns:wpg="http://schemas.microsoft.com/office/word/2010/wordprocessingGroup" xmlns:wpi="http://schemas.microsoft.com/office/word/2010/wordprocessingInk" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wps="http://schemas.microsoft.com/office/word/2010/wordprocessingShape" mc:Ignorable="w14 w15 w16se w16cid wp14">
      <w:body>
        <w:tbl>
          <w:tblPr>
            <w:tblStyle w:val="TableGrid"/>
            <w:tblW w:w="4966" w:type="pct"/>
            <w:tblBorders>
              <w:top w:val="none" w:sz="0" w:space="0" w:color="auto"/>
              <w:left w:val="none" w:sz="0" w:space="0" w:color="auto"/>
              <w:bottom w:val="none" w:sz="0" w:space="0" w:color="auto"/>
              <w:right w:val="none" w:sz="0" w:space="0" w:color="auto"/>
              <w:insideH w:val="none" w:sz="0" w:space="0" w:color="auto"/>
              <w:insideV w:val="none" w:sz="0" w:space="0" w:color="auto"/>
            </w:tblBorders>
            <w:tblLook w:val="04A0" w:firstRow="1" w:lastRow="0" w:firstColumn="1" w:lastColumn="0" w:noHBand="0" w:noVBand="1"/>
          </w:tblPr>
          <w:tblGrid>
            <w:gridCol w:w="4648"/>
            <w:gridCol w:w="4648"/>
          </w:tblGrid>
          <xsl:variable name="size" select="count(root/row)"/>
          <xsl:for-each  select="root/row[ceiling($size div 2) &gt;= position()]">
            <xsl:variable name="level0Count" select="position()"/>
            <xsl:variable name="imageid" select="position()+1"/>
            <xsl:variable name="level1Count" select="position() - 1"/>
            <xsl:variable name="level2Count" select="$level1Count * 2 + position()"/>
            <w:tr w:rsidR="003346C6" w:rsidTr="003346C6">
              <w:tc>
                <w:tcPr>
                  <w:tcW w:w="4648" w:type="dxa"/>
                </w:tcPr>
                <w:tbl>
                  <w:tblPr>
                    <w:tblStyle w:val="TableGrid"/>
                    <w:tblW w:w="4320" w:type="dxa"/>
                    <w:tblBorders>
                      <w:top w:val="none" w:sz="0" w:space="0" w:color="auto"/>
                    </w:tblBorders>
                    <w:tblLook w:val="04A0" w:firstRow="1" w:lastRow="0" w:firstColumn="1" w:lastColumn="0" w:noHBand="0" w:noVBand="1"/>
                  </w:tblPr>
                  <w:tblGrid>
                    <w:gridCol w:w="4363"/>
                  </w:tblGrid>
                  <w:tr w:rsidR="003346C6" w:rsidTr="00BD1383">
                    <w:trPr>
                      <w:trHeight w:val="3312"/>
                    </w:trPr>
                    <w:tc>
                      <w:tcPr>
                        <w:tcW w:w="4449" w:type="dxa"/>
                        <w:tcBorders>
                          <w:top w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                          <w:left w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                          <w:bottom w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                          <w:right w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                        </w:tcBorders>
                        <w:vAlign w:val="center"/>
                      </w:tcPr>
                      <w:p w:rsidR="003346C6" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                        <w:pPr>
                          <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                          <w:jc w:val="center"/>
                        </w:pPr>
                        <w:r>
                          <w:rPr>
                            <w:noProof/>
                          </w:rPr>
                          <w:drawing>
                            <wp:inline distT="0" distB="0" distL="0" distR="0" wp14:anchorId="453CE8C1" wp14:editId="4CBA1C43">
                              <wp:extent cx="2633472" cy="1755648"/>
                              <wp:effectExtent l="0" t="0" r="0" b="0"/>
                              <wp:docPr id="2" name="Picture 2" descr="Subject Photo" title="Subject Photo"/>
                              <wp:cNvGraphicFramePr>
                                <a:graphicFrameLocks xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" noChangeAspect="1"/>
                              </wp:cNvGraphicFramePr>
                              <a:graphic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main">
                                <a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture">
                                  <pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">
                                    <pic:nvPicPr>
                                      <pic:cNvPr id="0" name="61.jpg"/>
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
                                        <a:ext cx="2633472" cy="1755648"/>
                                      </a:xfrm>
                                      <a:prstGeom prst="rect">
                                        <a:avLst/>
                                      </a:prstGeom>
                                    </pic:spPr>
                                  </pic:pic>
                                </a:graphicData>
                              </a:graphic>
                            </wp:inline>
                          </w:drawing>
                        </w:r>
                      </w:p>
                    </w:tc>
                  </w:tr>
                  <w:tr w:rsidR="003346C6" w:rsidTr="00BD1383">
                    <w:trPr>
                      <w:trHeight w:hRule="exact" w:val="144"/>
                    </w:trPr>
                    <w:tc>
                      <w:tcPr>
                        <w:tcW w:w="4449" w:type="dxa"/>
                        <w:tcBorders>
                          <w:top w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                          <w:left w:val="nil"/>
                          <w:bottom w:val="nil"/>
                          <w:right w:val="nil"/>
                        </w:tcBorders>
                        <w:vAlign w:val="center"/>
                      </w:tcPr>
                      <w:p w:rsidR="003346C6" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                        <w:pPr>
                          <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                          <w:jc w:val="center"/>
                        </w:pPr>
                      </w:p>
                    </w:tc>
                  </w:tr>
                  <w:tr w:rsidR="003346C6" w:rsidTr="00BD1383">
                    <w:trPr>
                      <w:trHeight w:val="720"/>
                    </w:trPr>
                    <w:tc>
                      <w:tcPr>
                        <w:tcW w:w="4449" w:type="dxa"/>
                        <w:tcBorders>
                          <w:top w:val="nil"/>
                          <w:left w:val="nil"/>
                          <w:bottom w:val="nil"/>
                          <w:right w:val="nil"/>
                        </w:tcBorders>
                      </w:tcPr>
                      <w:p w:rsidR="003346C6" w:rsidRPr="0004412A" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                        <w:pPr>
                          <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                          <w:jc w:val="center"/>
                          <w:rPr>
                            <w:rFonts w:cstheme="minorHAnsi"/>
                            <w:b/>
                            <w:sz w:val="20"/>
                            <w:szCs w:val="20"/>
                          </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="0004412A">
                          <w:rPr>
                            <w:rFonts w:cstheme="minorHAnsi"/>
                            <w:b/>
                            <w:sz w:val="20"/>
                            <w:szCs w:val="20"/>
                          </w:rPr>
                          <xsl:choose>
                            <xsl:when test="position()=1">
                              <w:t>Improved Sale <xsl:value-of select="position()"/>
                                <w:b />
                              </w:t>
                            </xsl:when>
                            <xsl:otherwise>
                              <w:t>Improved Sale <xsl:value-of select="2*position()-1"/>
                                <w:b />
                              </w:t>
                            </xsl:otherwise>
                          </xsl:choose>
                        </w:r>
                      </w:p>
                      <w:p w:rsidR="003346C6" w:rsidRPr="005F3377" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                        <w:pPr>
                          <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                          <w:jc w:val="center"/>
                          <w:rPr>
                            <w:rFonts w:cstheme="minorHAnsi"/>
                            <w:sz w:val="20"/>
                            <w:szCs w:val="20"/>
                          </w:rPr>
                        </w:pPr>
                        <w:r>
                          <w:rPr>
                            <w:rFonts w:cstheme="minorHAnsi"/>
                            <w:sz w:val="20"/>
                            <w:szCs w:val="20"/>
                          </w:rPr>
                          <w:t><xsl:value-of select="following::row[(2*position()) - 1]/address"/></w:t>
                          <w:t xml:space="preserve">, </w:t>
                          <w:t><xsl:value-of select="following::row[(2*position()) - 1]/city"/></w:t>
                        </w:r>
                        <w:bookmarkStart w:id="0" w:name="_GoBack"/>
                        <w:bookmarkEnd w:id="0"/>
                      </w:p>
                    </w:tc>
                  </w:tr>
                </w:tbl>
                <w:p w:rsidR="003346C6" w:rsidRDefault="003346C6" w:rsidP="003346C6"/>
              </w:tc>
              <xsl:if test="following::row[ceiling($size div 2)]/city!=''">
                <w:tc>
                  <w:tcPr>
                    <w:tcW w:w="4648" w:type="dxa"/>
                  </w:tcPr>
                  <w:tbl>
                    <w:tblPr>
                      <w:tblStyle w:val="TableGrid"/>
                      <w:tblW w:w="4320" w:type="dxa"/>
                      <w:tblBorders>
                        <w:top w:val="none" w:sz="0" w:space="0" w:color="auto"/>
                      </w:tblBorders>
                      <w:tblLook w:val="04A0" w:firstRow="1" w:lastRow="0" w:firstColumn="1" w:lastColumn="0" w:noHBand="0" w:noVBand="1"/>
                    </w:tblPr>
                    <w:tblGrid>
                      <w:gridCol w:w="4363"/>
                    </w:tblGrid>
                    <w:tr w:rsidR="003346C6" w:rsidTr="00BD1383">
                      <w:trPr>
                        <w:trHeight w:val="3312"/>
                      </w:trPr>
                      <w:tc>
                        <w:tcPr>
                          <w:tcW w:w="4449" w:type="dxa"/>
                          <w:tcBorders>
                            <w:top w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                            <w:left w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                            <w:bottom w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                            <w:right w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                          </w:tcBorders>
                          <w:vAlign w:val="center"/>
                        </w:tcPr>
                        <w:p w:rsidR="003346C6" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                          <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                            <w:jc w:val="center"/>
                          </w:pPr>
                          <w:r>
                            <w:rPr>
                              <w:noProof/>
                            </w:rPr>
                            <w:drawing>
                              <wp:inline distT="0" distB="0" distL="0" distR="0" wp14:anchorId="42B9939F" wp14:editId="64610816">
                                <wp:extent cx="2633472" cy="1755648"/>
                                <wp:effectExtent l="0" t="0" r="0" b="0"/>
                                <wp:docPr id="2" name="Picture 2" descr="Subject Photo" title="Subject Photo"/>
                                <wp:cNvGraphicFramePr>
                                  <a:graphicFrameLocks xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" noChangeAspect="1"/>
                                </wp:cNvGraphicFramePr>
                                <a:graphic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main">
                                  <a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture">
                                    <pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture">
                                      <pic:nvPicPr>
                                        <pic:cNvPr id="0" name="61.jpg"/>
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
                                          <a:ext cx="2633472" cy="1755648"/>
                                        </a:xfrm>
                                        <a:prstGeom prst="rect">
                                          <a:avLst/>
                                        </a:prstGeom>
                                      </pic:spPr>
                                    </pic:pic>
                                  </a:graphicData>
                                </a:graphic>
                              </wp:inline>
                            </w:drawing>
                          </w:r>
                        </w:p>
                      </w:tc>
                    </w:tr>
                    <w:tr w:rsidR="003346C6" w:rsidTr="00BD1383">
                      <w:trPr>
                        <w:trHeight w:hRule="exact" w:val="144"/>
                      </w:trPr>
                      <w:tc>
                        <w:tcPr>
                          <w:tcW w:w="4449" w:type="dxa"/>
                          <w:tcBorders>
                            <w:top w:val="single" w:sz="18" w:space="0" w:color="1E4959"/>
                            <w:left w:val="nil"/>
                            <w:bottom w:val="nil"/>
                            <w:right w:val="nil"/>
                          </w:tcBorders>
                          <w:vAlign w:val="center"/>
                        </w:tcPr>
                        <w:p w:rsidR="003346C6" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                          <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                            <w:jc w:val="center"/>
                          </w:pPr>
                        </w:p>
                      </w:tc>
                    </w:tr>
                    <w:tr w:rsidR="003346C6" w:rsidTr="00BD1383">
                      <w:trPr>
                        <w:trHeight w:val="720"/>
                      </w:trPr>
                      <w:tc>
                        <w:tcPr>
                          <w:tcW w:w="4449" w:type="dxa"/>
                          <w:tcBorders>
                            <w:top w:val="nil"/>
                            <w:left w:val="nil"/>
                            <w:bottom w:val="nil"/>
                            <w:right w:val="nil"/>
                          </w:tcBorders>
                        </w:tcPr>
                        <w:p w:rsidR="003346C6" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                          <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                            <w:jc w:val="center"/>
                            <w:rPr>
                              <w:rFonts w:cstheme="minorHAnsi"/>
                              <w:sz w:val="20"/>
                              <w:szCs w:val="20"/>
                            </w:rPr>
                          </w:pPr>
                          <w:r>
                            <w:rPr>
                              <w:rFonts w:cstheme="minorHAnsi"/>
                              <w:b/>
                              <w:sz w:val="20"/>
                              <w:szCs w:val="20"/>
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
                          </w:r>
                        </w:p>
                        <w:p w:rsidR="003346C6" w:rsidRPr="005F3377" w:rsidRDefault="003346C6" w:rsidP="003346C6">
                          <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto"/>
                            <w:jc w:val="center"/>
                            <w:rPr>
                              <w:rFonts w:cstheme="minorHAnsi"/>
                              <w:sz w:val="20"/>
                              <w:szCs w:val="20"/>
                            </w:rPr>
                          </w:pPr>
                          <w:r>
                            <w:rPr>
                              <w:rFonts w:cstheme="minorHAnsi"/>
                              <w:sz w:val="20"/>
                              <w:szCs w:val="20"/>
                            </w:rPr>
							<xsl:choose>
                              <xsl:when test="position()=1">
								<w:t><xsl:value-of select="following::row[position()]/address"/></w:t>
								<w:t xml:space="preserve">, </w:t>
								<w:t><xsl:value-of select="following::row[position()]/city"/></w:t> 
                              </xsl:when>
							  
                              <xsl:otherwise> 
								    <w:t><xsl:value-of select="following::row[(2*position())]/address"/></w:t>
									<w:t xml:space="preserve">, </w:t>
									<w:t><xsl:value-of select="following::row[(2*position())]/city"/></w:t>   
                              </xsl:otherwise>
                            </xsl:choose>
                            
                          </w:r>
                        </w:p>
                      </w:tc>
                    </w:tr>
                  </w:tbl>
                  <w:p w:rsidR="003346C6" w:rsidRDefault="003346C6" w:rsidP="003346C6"/>
                </w:tc>
              </xsl:if>
            </w:tr>
          </xsl:for-each>
        </w:tbl>
        <w:p w:rsidR="00A00BC9" w:rsidRDefault="00A00BC9"/>
        <w:sectPr w:rsidR="00A00BC9">
          <w:pgSz w:w="12240" w:h="15840"/>
          <w:pgMar w:top="1440" w:right="1440" w:bottom="1440" w:left="1440" w:header="720" w:footer="720" w:gutter="0"/>
          <w:cols w:space="720"/>
          <w:docGrid w:linePitch="360"/>
        </w:sectPr>
      </w:body>
    </w:document>
  </xsl:template>
</xsl:stylesheet>

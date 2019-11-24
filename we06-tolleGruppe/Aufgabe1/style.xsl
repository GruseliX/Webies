<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
	<xsl:output omit-xml-declaration="yes" indent="yes" encoding="UTF-8" method="text"/>

	<!-- &#x9; entspricht tab - zum einrücken; &#xa; entspricht new line -->
	<!-- funktion name(), gibt den tag namen aus -->

	<xsl:template match="prices">
		{&#xa;
		&#x9;"<xsl:value-of select="name(description)"/>" : "<xsl:value-of select="description"/>",&#xa;
		&#x9;"<xsl:value-of select="name()"/>" : [&#xa;
		&#x9;<xsl:apply-templates select="price"/> &#xa;
		&#x9;]
		}
	</xsl:template>

	<!-- kritische Stelle ist das letzte Element im JSON array (letzte price element) -->
	<!-- fuer ein valides JSON wird hier das Komma nach der schliessenden (price) Objekt KLammer weggelassen-->
	<xsl:template match="price">
		<!-- für die Positionen ungleich der letzten, setze hinter die schliessende Klammer ein Komma -->
		<xsl:if test="not(position()=last())">
			&#x9;&#x9;{&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(name)"/>" : "<xsl:value-of select="name"/>",&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(start)"/>" : "<xsl:value-of select="start"/>",&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(end)"/>" : "<xsl:value-of select="end"/>",&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(cost)"/>" : "<xsl:value-of select="cost"/>" &#xa;
			&#x9;&#x9;},
		</xsl:if>

		<!-- bei der letzten Position, setze kein Komma; entsprechend valides JSON format -->
		<xsl:if test="(position()=last())">
			&#x9;&#x9;{&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(name)"/>" : "<xsl:value-of select="name"/>",&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(start)"/>" : "<xsl:value-of select="start"/>",&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(end)"/>" : "<xsl:value-of select="end"/>",&#xa;
			&#x9;&#x9;&#x9;"<xsl:value-of select="name(cost)"/>" : "<xsl:value-of select="cost"/>" &#xa;
			&#x9;&#x9;}
		</xsl:if>
	</xsl:template>

</xsl:stylesheet>
package com.example.equipotriggers;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Utils {
	// Método para validar el correo electrónico
	public static boolean esEmail(String correo) {
		Pattern pat = null;
		Matcher mat = null;
		pat = Pattern
				.compile("[a-zA-Z0-9]+[.[a-zA-Z0-9_-]+]*@[a-z0-9][\\w\\.-]*[a-z0-9]\\.[a-z][a-z\\.]*[a-z]$");
		mat = pat.matcher(correo);
		if (mat.find()) {
			System.out.println("[" + mat.group() + "]");
			return true;
		} else {
			return false;
		}
	}
}

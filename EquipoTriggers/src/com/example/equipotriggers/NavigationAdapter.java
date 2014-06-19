package com.example.equipotriggers;

import java.util.ArrayList;

import android.app.Activity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

public class NavigationAdapter extends BaseAdapter {
	private Activity activity;
	private ArrayList<Item_objct> arrayItms;

	public NavigationAdapter(Activity activity, ArrayList<Item_objct> arrayItms) {
		super();
		this.activity = activity;
		this.arrayItms = arrayItms;
	}

	// Retorna objeto Item_objct del array list
	@Override
	public Object getItem(int position) {
		return arrayItms.get(position);
	}

	public int getCount() {
		// TODO Auto-generated method stub
		return arrayItms.size();
	}

	@Override
	public long getItemId(int position) {
		return position;
	}

	// Declaramos clase estatica la cual representa a la fila
	public static class Fila {
		TextView titulo_itm;
	}

	public View getView(int position, View convertView, ViewGroup parent) {
		// TODO Auto-generated method stub
		Fila view;
		LayoutInflater inflator = activity.getLayoutInflater();
		if (convertView == null) {
			view = new Fila();
			// Creamos objeto item y lo obtenemos del array
			Item_objct itm = arrayItms.get(position);
			convertView = inflator.inflate(R.layout.slide_menu, null);
			// Titulo
			view.titulo_itm = (TextView) convertView
					.findViewById(R.id.tv_slide_menu_opcion);
			// Seteamos el titulo
			view.titulo_itm.setText(itm.getTitulo());
			// Icono

			convertView.setTag(view);
		} else {
			view = (Fila) convertView.getTag();
		}
		return convertView;
	}
}

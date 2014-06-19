package com.example.equipotriggers;

import java.util.ArrayList;

import android.app.Dialog;
import android.content.Intent;
import android.content.IntentSender;
import android.location.Location;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.DialogFragment;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBar;
import android.support.v7.app.ActionBarActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ImageView;
import android.widget.ListView;

import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.GooglePlayServicesClient;
import com.google.android.gms.common.GooglePlayServicesUtil;
import com.google.android.gms.location.LocationClient;
import com.google.android.gms.location.LocationListener;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.GoogleMap.OnInfoWindowClickListener;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

public class Principal extends ActionBarActivity implements LocationListener,
		GooglePlayServicesClient.ConnectionCallbacks,
		GooglePlayServicesClient.OnConnectionFailedListener,
		OnInfoWindowClickListener {

	private Location currentLocation;
	private LocationRequest mLocationRequest;
	private LocationClient mLocationClient;
	boolean mUpdatesRequested = false;

	// VARIABLES PARA EL SLIDE MENU
	private String[] titulos_SlideMenu;
	private ListView NavList_SlideMenu;
	private ArrayList<Item_objct> NavItms_SlideMenu;
	private NavigationAdapter NavAdapter_SlideMenu;
	private DrawerLayout SlideMenu;

	private boolean menuLateral;

	private GoogleMap mapa;
	private LatLng myPosition;

	private ArrayList<LatLng> posiciones;
	private Double latitud, longitud;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.inicio);

		/* INICIO MODIFICACION ACTION BAR */
		ActionBar ab = getSupportActionBar();
		ab.setDisplayOptions(ActionBar.DISPLAY_SHOW_CUSTOM);
		ab.setCustomView(R.layout.action_bar);
		/* FIN MODIFICACION ACTION BAR */

		createMenu();
		createPositions();
		createMapa();

		ImageView logoApp = (ImageView) findViewById(R.id.im_action_bar_icono);

		NavList_SlideMenu.setOnItemClickListener(new OnItemClickListener() {
			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				drawMarker(position);
			}
		});

		logoApp.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				showMenu();
			}
		});
	}

	@Override
	public void onStop() {
		if (mLocationClient.isConnected()) {
			stopPeriodicUpdates();
		}
		mLocationClient.disconnect();

		super.onStop();
	}

	@Override
	public void onStart() {
		super.onStart();
		mLocationClient.connect();

	}

	public void startUpdates(View v) {
		mUpdatesRequested = true;

		if (servicesConnected()) {
			startPeriodicUpdates();
		}
	}

	public void stopUpdates(View v) {
		mUpdatesRequested = false;

		if (servicesConnected()) {
			stopPeriodicUpdates();
		}
	}

	private boolean servicesConnected() {
		int resultCode = GooglePlayServicesUtil
				.isGooglePlayServicesAvailable(this);
		if (ConnectionResult.SUCCESS == resultCode) {
			return true;
		} else {
			Dialog dialog = GooglePlayServicesUtil.getErrorDialog(resultCode,
					this, 0);
			if (dialog != null) {
				ErrorDialogFragment errorFragment = new ErrorDialogFragment();
				errorFragment.setDialog(dialog);
				errorFragment.show(getSupportFragmentManager(),
						"EquipoTriggers");
			}
			return false;
		}
	}

	private void getLocation() {
		if (servicesConnected()) {
			currentLocation = mLocationClient.getLastLocation();
			myPosition = new LatLng(currentLocation.getLatitude(),
					currentLocation.getLongitude());
		}
	}

	private void createMapa() {
		mapa = ((SupportMapFragment) getSupportFragmentManager()
				.findFragmentById(R.id.map)).getMap();
		mapa.setMyLocationEnabled(true);
		mLocationRequest = LocationRequest.create();
		mLocationRequest.setInterval(5000);
		mLocationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
		mLocationRequest.setFastestInterval(1000);
		mLocationClient = new LocationClient(this, this, this);
	}

	private void createMenu() {
		SlideMenu = (DrawerLayout) findViewById(R.id.drawer_layout);
		NavList_SlideMenu = (ListView) findViewById(R.id.lista);

		SlideMenu
				.setDrawerShadow(R.drawable.drawer_shadow, GravityCompat.START);
		titulos_SlideMenu = getResources().getStringArray(
				R.array.slide_menu_opciones);

		NavItms_SlideMenu = new ArrayList<Item_objct>();

		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[0]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[1]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[2]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[3]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[4]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[5]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[6]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[7]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[8]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[9]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[10]));
		NavItms_SlideMenu.add(new Item_objct(titulos_SlideMenu[11]));
		NavAdapter_SlideMenu = new NavigationAdapter(this, NavItms_SlideMenu);

		NavList_SlideMenu.setAdapter(NavAdapter_SlideMenu);
	}

	private void showMenu() {
		if (menuLateral == false) {
			SlideMenu.openDrawer(NavList_SlideMenu);
			menuLateral = true;
		} else {
			SlideMenu.closeDrawer(NavList_SlideMenu);
			menuLateral = false;
		}
	}

	private void drawMarker(int posicion) {
		mapa.clear();

		for (int i = 0; i < posiciones.size(); i++) {
			if (i == posicion) {
				latitud = posiciones.get(i).latitude;
				longitud = posiciones.get(i).longitude;

				mapa.addMarker(new MarkerOptions().position(posiciones.get(i))
						.title(titulos_SlideMenu[i]));

				mapa.animateCamera(CameraUpdateFactory.newLatLngZoom(
						posiciones.get(i), 17));

				menuLateral = true;
				showMenu();
			}
		}

		mapa.setOnInfoWindowClickListener(this);
	}

	private void createPositions() {
		posiciones = new ArrayList<LatLng>();

		posiciones.add(new LatLng(40.408823344, -3.692554235));
		posiciones.add(new LatLng(40.446522493, -3.692693710));
		posiciones.add(new LatLng(40.310016185, -3.733946085));
		posiciones.add(new LatLng(40.282668644, -3.799027205));
		posiciones.add(new LatLng(40.423379549, -3.561211824));
		posiciones.add(new LatLng(40.328732474, -3.863550425));
		posiciones.add(new LatLng(40.494073614, -3.876081705));
		posiciones.add(new LatLng(40.454899026, -3.480144739));
		posiciones.add(new LatLng(40.239308884, -3.700000048));
		posiciones.add(new LatLng(40.235279339, -3.768879175));
		posiciones.add(new LatLng(40.311454900, -3.714348900));
		posiciones.add(new LatLng(40.453232100, -3.689385700));
	}

	@Override
	public void onInfoWindowClick(Marker arg0) {
		getLocation();
		Intent navigation = new Intent(Intent.ACTION_VIEW,
				Uri.parse("http://maps.google.com/maps?saddr="
						+ myPosition.latitude + "," + myPosition.longitude
						+ "&daddr=" + latitud + "," + longitud));
		startActivity(navigation);
	}

	private void startPeriodicUpdates() {
		mLocationClient.requestLocationUpdates(mLocationRequest, this);
	}

	private void stopPeriodicUpdates() {
		mLocationClient.removeLocationUpdates(this);
	}

	private void showErrorDialog(int errorCode) {
		Dialog errorDialog = GooglePlayServicesUtil.getErrorDialog(errorCode,
				this, 9000);
		if (errorDialog != null) {
			ErrorDialogFragment errorFragment = new ErrorDialogFragment();
			errorFragment.setDialog(errorDialog);
			errorFragment.show(getSupportFragmentManager(), "EquipoTriggers");
		}
	}

	public static class ErrorDialogFragment extends DialogFragment {
		private Dialog mDialog;

		public ErrorDialogFragment() {
			super();
			mDialog = null;
		}

		public void setDialog(Dialog dialog) {
			mDialog = dialog;
		}

		public Dialog onCreateDialog(Bundle savedInstanceState) {
			return mDialog;
		}
	}

	@Override
	public void onConnectionFailed(ConnectionResult arg0) {
		if (arg0.hasResolution()) {
			try {
				arg0.startResolutionForResult(this, 9000);
			} catch (IntentSender.SendIntentException e) {
				e.printStackTrace();
			}
		} else {
			showErrorDialog(arg0.getErrorCode());
		}
	}

	@Override
	public void onConnected(Bundle arg0) {
	}

	@Override
	public void onDisconnected() {
	}

	@Override
	public void onLocationChanged(Location arg0) {
	}
}

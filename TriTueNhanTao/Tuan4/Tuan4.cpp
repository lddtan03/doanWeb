#include <iostream>
#include <fstream>
using namespace std;
void ReadFile(const char* path, int**& a, int& n)
{
	fstream file(path, ios::in);
	if (!file.is_open())
		cout << "File is not open" << endl;
	else
	{
		file >> n;
		a = new int* [n];
		for (int i = 0; i < n; i++)
		{
			a[i] = new int[n];
			for (int j = 0; j < n; j++)
			{
				file >> a[i][j];
			}
		}
		file.close();
	}
}

void xuatmang(int** a, int n)
{
	for (int i = 0; i < n; i++)
	{
		for (int j = 0; j < n; j++)
		{
			cout << a[i][j] << " ";
		}
		cout << endl;
	}
}

void xuatmang_1(int* a, int n)
{
	for (int i = 0; i < n; i++)
	{
		cout << a[i] << " ";
	}
}

int bac(int* a, int n)
{
	int tong = 0;
	for (int i = 0; i < n; i++)
	{
		tong = tong + a[i];
	}
	return tong;
}

void sapxep(int **a, int n, int* id)
{
	int max;
	for (int i = 0; i < n - 1; i++)
	{
		max = i;
		for (int j = i+1; j < n; j++)
		{
			if (bac(a[id[max]], n) < bac(a[id[j]], n))
				max = j;
		}
		swap(id[i], id[max]);
	}
}

void coloring_WP(int** a, int n)
{
	int *id = new int[n];
	for (int i = 0; i < n; i++)
	{
		id[i] = i;
	}
	sapxep(a, n, id);
	int* color = new int[n];
	for (int i = 0; i < n; i++)
	{
		color[i] = 0;
	}
	int m = 1;
	for (int i = 0; i < n; i++)
	{
		if (color[i] == 0)
			color[i] = m;
		else
			continue;
		for (int j = i + 1; j < n; j++)
		{
			if (color[j] == 0 && a[id[i]][id[j]] == 0)
				color[j] = m;
		}
		m++;
	}
	cout << "So mau can dung de to la: " << m - 1 << endl;
	cout << "Ket qua to mau:" << endl;
	cout << "Dinh: ";
	xuatmang_1(id, n);
	cout << endl << "Mau:  ";
	xuatmang_1(color, n);
}
	int main()
{
	const char* f_input = "color1.txt";
	int** a;
	int n;
	ReadFile(f_input, a, n);
	cout << endl;
	coloring_WP(a, n);
}

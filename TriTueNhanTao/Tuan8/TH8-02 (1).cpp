#include <iostream>
#include <fstream>
#include<math.h>
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
int TinhH1(int** a, int** b, int n)
{
	int h1 = 0;
	for (int i = 0; i < n; i++)
	{
		for (int j = 0; j < n; j++)
		{
			if (a[i][j] != b[i][j] && a[i][j] != 0)
				h1++;
		}
	}
	return h1;
}
int buoc(int** a, int** b, int n, int i, int j)
{
	for (int k = 0; k < n; k++)
	{
		for (int l = 0; l < n; l++)
		{
			if (a[i][j] == b[k][l])
				return abs(k - i) + abs(l - j);
		}
	}
}
int TinhH2(int** a, int** b, int n)
{
	int h2 = 0;
	for (int i = 0; i < n; i++)
	{
		for (int j = 0; j < n; j++)
		{
			if (a[i][j] != b[i][j] && a[i][j] != 0)
			{
				h2 = h2 + buoc(a, b, n, i, j);
			}
		}
	}
	return h2;
}

void main()
{
	int** a, ** b, n;
	const char* f_start = "taci.txt";
	const char* f_end = "taci_end.txt";
	ReadFile(f_start, a, n);
	ReadFile(f_end, b, n);
	//xuatmang(a, n);
	//cout << endl;
	//xuatmang(b, n);
	cout << endl << "H1: " << TinhH1(a, b, n);
	cout << endl << "H2: " << TinhH2(a, b, n);
	for (int i = 0; i < n; i++)
	{
		delete[]a[i], b[i];
	}
	delete[]a, b;
}
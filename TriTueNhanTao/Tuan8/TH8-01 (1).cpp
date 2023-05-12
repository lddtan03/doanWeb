#include <iostream>
#include <fstream>
#include <cstdlib>
#include <ctime>
using namespace std;
int GetRandom(int n)
{
	return 0 + (int)(rand() * ((n - 1) - 0 + 1.0) / (1.0 + RAND_MAX));
}
void random(int**& a, int**& b, int& n)
{
	cout << "Nhap n: ";
	cin >> n;
	a = new int* [n];
	b = new int* [n];
	for (int k = 0; k < n; k++)
	{
		a[k] = new int[n];
		b[k] = new int[n];
	}
	int i, j;
	for (int k = 0; k <= (n * n - 1); k++)
	{
		do
		{
			i = GetRandom(n);
			j = GetRandom(n);			
		} while (a[i][j] >= 0);
		a[i][j] = k;
		do
		{
			i = GetRandom(n);
			j = GetRandom(n);
		} while (b[i][j] >= 0);
		b[i][j] = k;
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

void WriteFile(const char* path, int** a, int n)
{
	fstream file(path, ios::out);
	if (!file.is_open())
		cout << "File is not open" << endl;
	else
	{
		file << n << endl;
		for (int i = 0; i < n; i++)
		{
			for (int j = 0; j < n; j++)
			{
				file << a[i][j] << " ";
			}
			file << endl;
		}
		file.close();
	}
}

void main()
{
	srand((unsigned int)time(NULL));
	int** a, ** b, n;
	random(a, b, n);
	/*xuatmang(a, n);
	cout << endl;
	xuatmang(b, n);*/
	const char* f_start = "taci.txt";
	const char* f_end = "taci_end.txt";
	WriteFile(f_start, a, n);
	WriteFile(f_end, b, n);
	for (int i = 0; i < n; i++)
	{
		delete[]a[i], b[i];
	}
	delete[]a, b;
}
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

bool check_tour(int j, int *tour, int i)
{
	int k = 0;
	while (k < i)
	{
		if (j == tour[k])
			return false;
		k++;
	}
	return true;
}

void tsp(int** a, int n)
{
	int start = -1;
	while (start < 0 || start > n-1)
	{
		cout << "Chon thanh pho xuat phat: ";
		cin >> start;
	}
	int cost = 0;
	int lc = start;
	int* tour = new int[n+1];
	tour[0] = lc;
	for (int i = 1; i < n; i++)
	{
		int next_lc = 0;
		int j = 1;
		while (a[lc][next_lc] == 0 || !check_tour(next_lc, tour, i))
		{
			next_lc++;
			j++;
		}
		for (j; j < n; j++)
		{
			if ((a[lc][j] < a[lc][next_lc]) && (check_tour(j, tour, i)) && (a[lc][j] != 0))
			{
				next_lc = j;	
			}			
		}
		cost = cost + a[lc][next_lc];
		tour[i] = next_lc;
		lc = next_lc;
	}
	tour[n] = start;
	cost = cost + a[lc][start];
	cout << "Hanh trinh ngan nhat la: ";
	for (int i = 0; i < n+1; i++)
	{
		cout << tour[i] << " ";
	}
	cout << "co do dai: " << cost;
}

int main()
{
	const char* f_input = "tsp_15vertex.txt";
	int** a;
	int n;
	ReadFile(f_input, a, n);
	xuatmang(a, n);
	tsp(a, n);
	for (int i = 0; i < n; i++)
	{
		delete[] a[i];
	}
	delete[] a;
	return 0;
}

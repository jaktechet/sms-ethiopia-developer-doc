package main

import (
    "fmt"
    "net/http"
    "strings"
    "io/ioutil"
)

func main() {
    url := "your_list_url"
    method := "POST"

    payload := `{
        "username": "your_username",
        "password": "your_password",
        "to": ["9xxxxxxxxx", "9xxxxxxxxx", "9xxxxxxxxx"],
        "text": "your_message"
    }`

    client := &http.Client{}
    req, err := http.NewRequest(method, url, strings.NewReader(payload))

    if err != nil {
        fmt.Println(err)
        return
    }
    req.Header.Add("Content-Type", "application/json")

    res, err := client.Do(req)
    if err != nil {
        fmt.Println(err)
        return
    }
    defer res.Body.Close()

    body, err := ioutil.ReadAll(res.Body)
    if err != nil {
        fmt.Println(err)
        return
    }
    fmt.Println(string(body))
}
